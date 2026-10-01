<?php
// Inicializa a sessão para permitir o acesso às variáveis armazenadas no servidor
session_start();

// Módulo de Segurança: Redireciona para o formulário (index.php) se não houver dados de reserva na sessão
if (!isset($_SESSION['reserva'])) {
    header('Location: index.php');
    exit; // Interrompe a execução do script imediatamente após o redirecionamento
}

// Armazena a estrutura de dados da reserva em uma variável local para facilitar a leitura no HTML
$reserva = $_SESSION['reserva'];
?>
<!DOCTYPE html>
<html lang="pt-BR" class="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineMax - Relatório de Reserva</title>

  <!-- Inclusão do framework Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Carregamento de Fontes do Google (Plus Jakarta Sans) e Ícones do Font Awesome -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Configurações personalizadas do Tailwind CSS (Cores da marca e fonte padrão) -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#fff1f2',
              100: '#ffe4e6',
              500: '#f43f5e',
              600: '#e11d48',
              700: '#be123c',
              900: '#881337',
            }
          }
        }
      }
    }
  </script>

  <!-- Regras de CSS específicas para formatação de impressão em papel/PDF -->
  <style>
    @media print {
      body { background: white !important; }
      /* Oculta elementos marcados com 'no-print' durante a impressão */
      .no-print { display: none !important; }
      /* Remove sombras de elementos para economizar tinta e manter visual limpo */
      .print-shadow-none { shadow: none !important; border: 1px solid #e2e8f0 !important; }
    }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen selection:bg-brand-500 selection:text-white pb-12">

  <!-- Elementos decorativos de fundo com efeito Blur (escondidos na impressão) -->
  <div class="fixed top-0 left-1/4 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl pointer-events-none no-print"></div>
  <div class="fixed bottom-0 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none no-print"></div>

  <!-- Container principal centralizado -->
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 relative z-10">

    <!-- Cabeçalho da página com logotipo e botão de ação (escondido na impressão) -->
    <header class="flex items-center justify-between pb-6 mb-8 border-b border-slate-200 no-print">
      <div class="flex items-center gap-3">
        <!-- Ícone da marca -->
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-amber-500 flex items-center justify-center text-white shadow-lg shadow-brand-600/20">
          <i class="fa-solid fa-film text-xl"></i>
        </div>
        <div>
          <h1 class="text-xl font-bold tracking-tight text-slate-900">CineMax VIP</h1>
          <p class="text-xs text-slate-500">Relatório e Bilhete de Compra</p>
        </div>
      </div>
      <!-- Link de navegação para registrar nova reserva -->
      <a href="index.php" class="text-xs font-semibold text-brand-600 hover:text-brand-700 flex items-center gap-1.5 bg-brand-50 hover:bg-brand-100 border border-brand-200/60 px-3.5 py-2 rounded-xl transition-all">
        <i class="fa-solid fa-arrow-left"></i> Nova Reserva
      </a>
    </header>

    <!-- Cartão Principal do Comprovante/Bilhete -->
    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-xl print-shadow-none">
      
      <!-- Cabeçalho do Cartão: Mensagem de confirmação e código gerado -->
      <div class="bg-emerald-500 text-white p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-xl shrink-0">
            <i class="fa-solid fa-circle-check"></i>
          </div>
          <div>
            <h2 class="font-bold text-lg leading-tight">Reserva Confirmada!</h2>
            <p class="text-xs text-emerald-100 mt-0.5">Apresente este bilhete na entrada do cinema</p>
          </div>
        </div>
        <!-- Exibição do código identificador da reserva (utiliza fallback dinâmico caso a chave principal não exista) -->
        <div class="text-right sm:text-right text-center">
          <span class="text-[10px] uppercase tracking-wider text-emerald-200 block">Código da Reserva</span>
          <span class="font-mono bg-white/15 border border-white/20 text-white px-3 py-1 rounded-lg text-sm font-bold tracking-wider inline-block mt-0.5">
            <?= htmlspecialchars($reserva['id_reserva'] ?? $reserva['id'] ?? $reserva['codigo'] ?? strtoupper(uniqid('RES-'))); ?>
          </span>
        </div>
      </div>

      <!-- Corpo do Comprovante -->
      <div class="p-6 sm:p-8 space-y-6">
        
        <!-- Módulo de Informações do Filme -->
        <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start border-b border-slate-100 pb-6">
          <!-- Cartaz do filme -->
          <img src="<?= htmlspecialchars($reserva['imagem'] ?? ''); ?>" alt="<?= htmlspecialchars($reserva['filme'] ?? 'Filme'); ?>" class="w-32 h-44 object-cover rounded-2xl shadow-md border border-slate-200 shrink-0">
          
          <div class="space-y-3 text-center sm:text-left flex-1">
            <div>
              <!-- Formato do filme (3D, IMAX, 2D, etc.) -->
              <span class="text-[10px] bg-brand-100 text-brand-700 border border-brand-200 font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider inline-block mb-1">
                <?= htmlspecialchars($reserva['formato'] ?? 'PADRÃO'); ?>
              </span>
              <!-- Título do Filme -->
              <h3 class="text-2xl font-bold text-slate-900 leading-snug"><?= htmlspecialchars($reserva['filme'] ?? 'Título do Filme'); ?></h3>
            </div>

            <!-- Dados da Sala e Data/Hora de emissão do bilhete -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-600">
              <p><i class="fa-solid fa-location-dot text-brand-600 mr-1.5"></i> <strong>Sala:</strong> <?= htmlspecialchars($reserva['sala'] ?? 'N/A'); ?></p>
              <p><i class="fa-regular fa-clock text-brand-600 mr-1.5"></i> <strong>Emissão:</strong> <?= htmlspecialchars($reserva['data_compra'] ?? date('d/m/Y H:i')); ?></p>
            </div>
          </div>
        </div>

        <!-- Grade Resumo dos Dados do Cliente e Ingressos -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100 text-xs">
          <div>
            <span class="text-slate-400 block mb-0.5">Cliente</span>
            <strong class="text-slate-800 text-sm block truncate" title="<?= htmlspecialchars($reserva['nome'] ?? ''); ?>">
              <?= htmlspecialchars($reserva['nome'] ?? 'Cliente'); ?>
            </strong>
          </div>
          <div>
            <span class="text-slate-400 block mb-0.5">Qtd. Ingressos</span>
            <strong class="text-slate-800 text-sm block"><?= htmlspecialchars($reserva['qtd_ingresso'] ?? 1); ?>x</strong>
          </div>
          <div>
            <span class="text-slate-400 block mb-0.5">Tipo de Entrada</span>
            <strong class="text-slate-800 text-sm block"><?= htmlspecialchars($reserva['tipo_ingresso'] ?? 'Inteira'); ?></strong>
          </div>
          <div>
            <span class="text-slate-400 block mb-0.5">Preço Unitário</span>
            <strong class="text-slate-800 text-sm block">R$ <?= number_format($reserva['preco_unitario'] ?? 0, 2, ',', '.'); ?></strong>
          </div>
        </div>

        <!-- Detalhamento dos Valores Financeiros (Subtotal, Desconto e Total) -->
        <div class="space-y-2.5 pt-2 text-xs">
          <!-- Exibição do Subtotal -->
          <div class="flex justify-between text-slate-600">
            <span>Subtotal (<?= $reserva['qtd_ingresso'] ?? 1; ?>x ingresso)</span>
            <span class="font-semibold text-slate-800">R$ <?= number_format($reserva['subtotal'] ?? 0, 2, ',', '.'); ?></span>
          </div>
          <!-- Exibição do Desconto Aplicado -->
          <div class="flex justify-between text-emerald-600">
            <span class="flex items-center gap-1"><i class="fa-solid fa-tag"></i> Desconto Promocional (10%)</span>
            <span class="font-semibold">- R$ <?= number_format($reserva['desconto'] ?? 0, 2, ',', '.'); ?></span>
          </div>
          
          <!-- Valor Total Pago -->
          <div class="border-t border-slate-100 pt-4 mt-2 flex justify-between items-center text-sm font-bold text-slate-900">
            <span class="text-base">Total Pago</span>
            <span class="text-2xl text-brand-600">R$ <?= number_format($reserva['total'] ?? 0, 2, ',', '.'); ?></span>
          </div>
        </div>

      </div>

      <!-- Rodapé do Cartão: Botão para acionar a impressão/salvamento do arquivo (escondido na impressão) -->
      <div class="bg-slate-50 border-t border-slate-100 p-4 text-center no-print">
        <button onclick="window.print()" class="py-3 px-6 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 active:scale-[0.99] transition-all inline-flex items-center gap-2 shadow-md">
          <i class="fa-solid fa-print"></i> Imprimir / Salvar PDF
        </button>
      </div>

    </div>