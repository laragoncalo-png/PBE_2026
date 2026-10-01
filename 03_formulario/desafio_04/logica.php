<?php
// Inicia ou retoma a sessão do PHP para armazenar os dados entre requisições
session_start();

/* ==========================================================================
   1. PROCESSAMENTO DO FORMULÁRIO (MÉTODO POST)
   ========================================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Captura e sanitiza as entradas vindas do formulário para evitar ataques XSS
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $filme = filter_input(INPUT_POST, 'filme', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Valida se a quantidade é um inteiro (caso inválido/vazio, define o padrão para 1)
    $qtd_ingresso = filter_input(INPUT_POST, 'qtd_ingresso', FILTER_VALIDATE_INT) ?: 1;
    
    // Sanitiza o tipo de ingresso (caso não informado, assume 'inteira')
    $tipo_ingresso = filter_input(INPUT_POST, 'tipo_ingresso', FILTER_SANITIZE_SPECIAL_CHARS) ?: 'inteira';
    
    // Captura o identificador do filme selecionado
    $tipo_slug = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

    // Mapeamento e dados estáticos do catálogo de filmes disponíveis
    $filmes = [
        'paixao' => [
            'titulo' => 'Diário de Uma Paixão',
            'imagem' => 'https://m.media-amazon.com/images/M/MV5BZjY0YzYwMDQtYmJjNi00Yzg5LWE3OTYtNDQzOGYxN2JiNGQ4XkEyXkFqcGc@._V1_.jpg',
            'sala' => 'Sala 02',
            'formato' => 'Dublado / Legendado',
            'preco' => 30.00
        ],
        'antes' => [
            'titulo' => 'Como Eu Era Antes de Você',
            'imagem' => 'https://br.web.img3.acsta.net/c_310_420/pictures/16/02/03/19/11/303307.jpg',
            'sala' => 'Sala 04',
            'formato' => 'Dublado',
            'preco' => 30.00
        ],
        'telefone' => [
            'titulo' => 'Telefone Preto',
            'imagem' => 'https://m.media-amazon.com/images/S/pv-target-images/594cd6c2c681c0d3800cb63c96909c210af3e95d239fa3d2c737c92c27a4c5ee._UR2000,3000_.png',
            'sala' => 'Sala 01',
            'formato' => 'Legendado',
            'preco' => 30.00
        ]
    ];

    // Busca o filme no catálogo pelo slug. Se não existir, utiliza uma estrutura padrão
    $filme_selecionado = $filmes[$tipo_slug] ?? [
        'titulo' => $filme ?: 'Filme não selecionado',
        'imagem' => 'https://via.placeholder.com/300x450',
        'sala' => 'Sala --',
        'formato' => 'Digital',
        'preco' => 30.00
    ];

    /* ----------------------------------------------------------------------
       CÁLCULOS FINANCEIROS
       ---------------------------------------------------------------------- */
    $preco_base = $filme_selecionado['preco'];
    
    // Aplica regra de meia-entrada (50% do valor base)
    $preco_unitario = ($tipo_ingresso === 'meia') ? ($preco_base / 2) : $preco_base;
    
    // Calcula o subtotal com base na quantidade de ingressos
    $subtotal = $preco_unitario * $qtd_ingresso;
    
    // Aplica desconto promocional fixo de 10%
    $desconto = $subtotal * 0.10; 
    
    // Define o valor total líquido a ser pago
    $total_final = $subtotal - $desconto;

    /* ----------------------------------------------------------------------
       PERSISTÊNCIA NA SESSÃO E REDIRECIONAMENTO
       ---------------------------------------------------------------------- */
    // Monta a estrutura da reserva e salva na sessão do usuário
    $_SESSION['reserva'] = [
        'id_reserva' => strtoupper(uniqid('#CNX-')), // Gera um ID único em caixa alta
        'nome' => $nome,
        'filme' => $filme_selecionado['titulo'],
        'imagem' => $filme_selecionado['imagem'],
        'sala' => $filme_selecionado['sala'],
        'formato' => $filme_selecionado['formato'],
        'qtd_ingresso' => $qtd_ingresso,
        'tipo_ingresso' => ucfirst($tipo_ingresso),
        'preco_unitario' => $preco_unitario,
        'subtotal' => $subtotal,
        'desconto' => $desconto,
        'total' => $total_final,
        'data_compra' => date('d/m/Y H:i') // Data e hora atual do servidor
    ];

    // Redireciona o usuário para a página de relatório (evita reenvio do formulário no F5)
    header('Location: view_relatorio.php');
    exit;

} else {
    // Se a página for acessada diretamente sem POST, é redirecionado para a página inicial
    header('Location: index.php');
    exit;
}

/* ==========================================================================
   2. VALIDAÇÃO DE ACESSO À PÁGINA
   ========================================================================== */
session_start();

// Garante que só continue a renderização se existir uma reserva gravada na sessão
if (!isset($_SESSION['reserva'])) {
    header('Location: index.php');
    exit;
}

// Extrai os dados da sessão para uma variável mais simples de utilizar no HTML
$reserva = $_SESSION['reserva'];
?>
<!DOCTYPE html>
<html lang="pt-BR" class="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineMax - Comprovante de Reserva</title>
  
  <!-- Dependências: Tailwind CSS via CDN, Google Fonts e FontAwesome para ícones -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Configurações customizadas do Tailwind -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
          colors: {
            brand: { 50: '#fff1f2', 100: '#ffe4e6', 500: '#f43f5e', 600: '#e11d48', 700: '#be123c', 900: '#881337' }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen selection:bg-brand-500 selection:text-white pb-12">

  <!-- Elementos decorativos de iluminação de fundo (Efeito Glow/Blur) -->
  <div class="fixed top-0 left-1/4 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>
  <div class="fixed bottom-0 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

  <!-- Container principal centralizado -->
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 relative z-10">

    <!-- Cabeçalho com logo e botão de navegação -->
    <header class="flex items-center justify-between pb-6 mb-8 border-b border-slate-200">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-amber-500 flex items-center justify-center text-white">
          <i class="fa-solid fa-film text-xl"></i>
        </div>
        <h1 class="text-xl font-bold tracking-tight text-slate-900">CineMax VIP</h1>
      </div>
      <a href="index.php" class="text-xs font-semibold text-brand-600 hover:text-brand-700 flex items-center gap-1.5 bg-brand-50 px-3 py-2 rounded-xl transition">
        <i class="fa-solid fa-arrow-left"></i> Nova Reserva
      </a>
    </header>

    <!-- Cartão / Ingressos principal -->
    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-xl">
      
      <!-- Banner Superior de Confirmação -->
      <div class="bg-emerald-500 text-white p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-xl">
            <i class="fa-solid fa-circle-check"></i>
          </div>
          <div>
            <h2 class="font-bold text-lg">Reserva Confirmada!</h2>
            <p class="text-xs text-emerald-100">Apresente este bilhete na entrada do cinema</p>
          </div>
        </div>
        <!-- Exibe o ID único do Bilhete -->
        <span class="font-mono bg-white/10 text-white px-3 py-1 rounded-lg text-xs font-semibold tracking-wider">
          <?= $reserva['id_reserva']; ?>
        </span>
      </div>

      <!-- Corpo do Bilhete (Informações do Filme) -->
      <div class="p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row gap-6 items-center border-b border-slate-100 pb-6">
          <img src="<?= $reserva['imagem']; ?>" alt="<?= $reserva['filme']; ?>" class="w-28 h-40 object-cover rounded-xl shadow-md">
          
          <div class="space-y-2 text-center sm:text-left flex-1">
            <span class="text-[10px] bg-brand-100 text-brand-700 border border-brand-200 font-bold px-2 py-0.5 rounded uppercase">
              <?= $reserva['formato']; ?>
            </span>
            <h3 class="text-xl font-bold text-slate-900"><?= $reserva['filme']; ?></h3>
            <p class="text-xs text-slate-500"><i class="fa-solid fa-location-dot mr-1 text-brand-600"></i> <?= $reserva['sala']; ?></p>
            <p class="text-xs text-slate-500"><i class="fa-solid fa-calendar mr-1"></i> Data: <?= $reserva['data_compra']; ?></p>
          </div>
        </div>

        <!-- Grade com Detalhes do Cliente e Ingressos -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 bg-slate-50 p-4 rounded-2xl text-xs">
          <div>
            <span class="text-slate-400 block">Cliente</span>
            <strong class="text-slate-800 text-sm block truncate"><?= $reserva['nome']; ?></strong>
          </div>
          <div>
            <span class="text-slate-400 block">Qtd. Ingressos</span>
            <strong class="text-slate-800 text-sm block"><?= $reserva['qtd_ingresso']; ?>x</strong>
          </div>
          <div>
            <span class="text-slate-400 block">Tipo Entrada</span>
            <strong class="text-slate-800 text-sm block"><?= $reserva['tipo_ingresso']; ?></strong>
          </div>
          <div>
            <span class="text-slate-400 block">Preço Unitário</span>
            <strong class="text-slate-800 text-sm block">R$ <?= number_format($reserva['preco_unitario'], 2, ',', '.'); ?></strong>
          </div>
        </div>

        <!-- Resumo Financeiro (Subtotal, Desconto e Total Pago) -->
        <div class="space-y-2 pt-2 border-t border-slate-100 text-xs">
          <div class="flex justify-between text-slate-600">
            <span>Subtotal</span>
            <span class="font-semibold text-slate-800">R$ <?= number_format($reserva['subtotal'], 2, ',', '.'); ?></span>
          </div>
          <div class="flex justify-between text-emerald-600">
            <span>Desconto (10% Promo)</span>
            <span class="font-semibold">- R$ <?= number_format($reserva['desconto'], 2, ',', '.'); ?></span>
          </div>
          <div class="flex justify-between items-center text-sm font-bold text-slate-900 pt-3 border-t border-slate-100">
            <span>Valor Total Pago</span>
            <span class="text-xl text-brand-600">R$ <?= number_format($reserva['total'], 2, ',', '.'); ?></span>
          </div>
        </div>
      </div>

      <!-- Rodapé do Cartão com Ação de Impressão -->
      <div class="bg-slate-50 border-t border-slate-100 p-4 text-center">
        <button onclick="window.print()" class="py-2.5 px-6 rounded-xl bg-slate-900 text-white font-semibold text-xs hover:bg-slate-800 transition inline-flex items-center gap-2">
          <i class="fa-solid fa-print"></i> Imprimir Comprovante
        </button>
      </div>
    </div>

  </div>

</body>
</html>