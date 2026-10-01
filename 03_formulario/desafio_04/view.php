<!DOCTYPE html>
<html lang="pt-BR" class="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineMax - Reserve seus Ingressos</title>
  
  <!-- Carregamento de frameworks e bibliotecas externas via CDN -->
  <!-- Tailwind CSS: Framework utilitário para estilização rápida -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Fonte do Google Fonts: Plus Jakarta Sans -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- FontAwesome: Ícones para interface de usuário -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Configurações personalizadas do Tailwind CSS -->
  <script>
    tailwind.config = {
      darkMode: 'class', // Habilita suporte a modo escuro via classe
      theme: {
        extend: {
          // Define a fonte padrão como Plus Jakarta Sans
          fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
          // Extensão da paleta de cores para a marca (tons de rosa/vermelho)
          colors: {
            brand: { 50: '#fff1f2', 100: '#ffe4e6', 500: '#f43f5e', 600: '#e11d48', 700: '#be123c', 900: '#881337' }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen selection:bg-brand-500 selection:text-white pb-12">

  <!-- Elementos decorativos de fundo (orbes desfocadas com gradiente e blur) -->
  <div class="fixed top-0 left-1/4 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>
  <div class="fixed bottom-0 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

  <!-- Container principal do sistema de reservas -->
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 relative z-10">

    <!-- Cabeçalho da página -->
    <header class="flex flex-col md:flex-row items-center justify-between gap-4 py-6 mb-8 border-b border-slate-200">
      <!-- Logo e Título da Plataforma -->
      <div class="flex items-center gap-3">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-600 to-amber-500 flex items-center justify-center shadow-lg shadow-brand-600/20">
          <i class="fa-solid fa-film text-2xl text-white"></i>
        </div>
        <div>
          <h1 class="text-2xl font-bold tracking-tight text-slate-900 flex items-center gap-2">
            CineMax <span class="text-xs bg-brand-100 text-brand-700 border border-brand-200 font-semibold px-2.5 py-0.5 rounded-full uppercase tracking-wider">VIP</span>
          </h1>
          <p class="text-xs text-slate-500">Sua experiência de cinema de alta qualidade</p>
        </div>
      </div>

      <!-- Informação de Cupom Promocional -->
      <div class="flex items-center gap-3 bg-white/80 border border-slate-200/80 rounded-2xl px-4 py-2.5 backdrop-blur-md shadow-sm">
        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">
          <i class="fa-solid fa-tags"></i>
        </div>
        <div>
          <div class="text-xs text-slate-500">Cupom Aplicado Automaticamente</div>
          <div class="text-sm font-bold text-emerald-600 uppercase tracking-wide">10% DE DESCONTO EM TUDO</div>
        </div>
      </div>
    </header>

    <!-- Formulário principal de reserva de ingressos (processado por logica.php via POST) -->
    <form id="ticketForm" action="logica.php" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8">

      <!-- COLUNA ESQUERDA: Seleção de Filmes e Dados do Cliente -->
      <section class="lg:col-span-7 xl:col-span-8 space-y-6">
        <div class="flex items-center justify-between">
          <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-clapperboard text-brand-600"></i>
            Escolha o Filme em Cartaz
          </h2>
          <span class="text-xs text-slate-500">Selecione 1 filme</span>
        </div>

        <!-- Grade com os Cards dos Filmes Disponíveis -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

          <!-- Card do Filme 1: Diário de Uma Paixão -->
          <label class="movie-card relative group cursor-pointer block">
            <!-- Radio button oculto estilizado via classes 'peer' do Tailwind -->
            <input type="radio" name="tipo" value="paixao" class="sr-only peer" required onchange="selectMovie('paixao', 'Diário de Uma Paixão', 30)">
            <div class="h-full bg-white border-2 border-slate-200 rounded-2xl overflow-hidden p-3 transition-all duration-300 peer-checked:border-brand-600 peer-checked:bg-brand-50/50 peer-checked:shadow-xl group-hover:border-slate-300 flex flex-col justify-between shadow-sm">
              <!-- Ícone de Check exibido dinamicamente quando selecionado -->
              <div class="absolute top-5 right-5 z-10 w-6 h-6 rounded-full bg-brand-600 text-white opacity-0 peer-checked:opacity-100 transition-opacity flex items-center justify-center shadow-md">
                <i class="fa-solid fa-check text-xs"></i>
              </div>
              <div>
                <div class="aspect-[2/3] w-full rounded-xl overflow-hidden bg-slate-100 mb-3 relative">
                  <img src="https://m.media-amazon.com/images/M/MV5BZjY0YzYwMDQtYmJjNi00Yzg5LWE3OTYtNDQzOGYxN2JiNGQ4XkEyXkFqcGc@._V1_.jpg" alt="Diário de Uma Paixão" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                  <span class="absolute bottom-2 left-2 text-[10px] bg-white/90 text-amber-700 border border-amber-200 px-2 py-0.5 rounded font-semibold">Romance</span>
                </div>
                <h3 class="font-bold text-sm text-slate-800 group-hover:text-brand-600 transition-colors line-clamp-1">Diário de Uma Paixão</h3>
                <p class="text-xs text-slate-500 mt-1">Sala 02 • Dublado / Legendado</p>
              </div>
              <div class="mt-4 pt-3 border-t border-slate-100 space-y-3">
                <div class="flex justify-between items-center text-xs">
                  <span class="text-slate-500">Preço Padrão:</span>
                  <span class="font-bold text-slate-800">R$ 30,00</span>
                </div>
                <div class="w-full py-2 px-3 rounded-xl bg-slate-100 text-slate-700 font-semibold text-xs text-center peer-checked:bg-brand-600 peer-checked:text-white transition-all flex items-center justify-center gap-2">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Selecionar Filme</span>
                </div>
              </div>
            </div>
          </label>

          <!-- Card do Filme 2: Como Eu Era Antes de Você -->
          <label class="movie-card relative group cursor-pointer block">
            <input type="radio" name="tipo" value="antes" class="sr-only peer" onchange="selectMovie('antes', 'Como Eu Era Antes de Você', 30)">
            <div class="h-full bg-white border-2 border-slate-200 rounded-2xl overflow-hidden p-3 transition-all duration-300 peer-checked:border-brand-600 peer-checked:bg-brand-50/50 peer-checked:shadow-xl group-hover:border-slate-300 flex flex-col justify-between shadow-sm">
              <div class="absolute top-5 right-5 z-10 w-6 h-6 rounded-full bg-brand-600 text-white opacity-0 peer-checked:opacity-100 transition-opacity flex items-center justify-center shadow-md">
                <i class="fa-solid fa-check text-xs"></i>
              </div>
              <div>
                <div class="aspect-[2/3] w-full rounded-xl overflow-hidden bg-slate-100 mb-3 relative">
                  <img src="https://br.web.img3.acsta.net/c_310_420/pictures/16/02/03/19/11/303307.jpg" alt="Como eu era Antes de você" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                  <span class="absolute bottom-2 left-2 text-[10px] bg-white/90 text-amber-700 border border-amber-200 px-2 py-0.5 rounded font-semibold">Drama/Romance</span>
                </div>
                <h3 class="font-bold text-sm text-slate-800 group-hover:text-brand-600 transition-colors line-clamp-1">Como Eu Era Antes de Você</h3>
                <p class="text-xs text-slate-500 mt-1">Sala 04 • Dublado</p>
              </div>
              <div class="mt-4 pt-3 border-t border-slate-100 space-y-3">
                <div class="flex justify-between items-center text-xs">
                  <span class="text-slate-500">Preço Padrão:</span>
                  <span class="font-bold text-slate-800">R$ 30,00</span>
                </div>
                <div class="w-full py-2 px-3 rounded-xl bg-slate-100 text-slate-700 font-semibold text-xs text-center peer-checked:bg-brand-600 peer-checked:text-white transition-all flex items-center justify-center gap-2">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Selecionar Filme</span>
                </div>
              </div>
            </div>
          </label>

          <!-- Card do Filme 3: Telefone Preto -->
          <label class="movie-card relative group cursor-pointer block">
            <input type="radio" name="tipo" value="telefone" class="sr-only peer" onchange="selectMovie('telefone', 'Telefone Preto', 30)">
            <div class="h-full bg-white border-2 border-slate-200 rounded-2xl overflow-hidden p-3 transition-all duration-300 peer-checked:border-brand-600 peer-checked:bg-brand-50/50 peer-checked:shadow-xl group-hover:border-slate-300 flex flex-col justify-between shadow-sm">
              <div class="absolute top-5 right-5 z-10 w-6 h-6 rounded-full bg-brand-600 text-white opacity-0 peer-checked:opacity-100 transition-opacity flex items-center justify-center shadow-md">
                <i class="fa-solid fa-check text-xs"></i>
              </div>
              <div>
                <div class="aspect-[2/3] w-full rounded-xl overflow-hidden bg-slate-100 mb-3 relative">
                  <img src="https://m.media-amazon.com/images/S/pv-target-images/594cd6c2c681c0d3800cb63c96909c210af3e95d239fa3d2c737c92c27a4c5ee._UR2000,3000_.png" alt="Telefone preto" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                  <span class="absolute bottom-2 left-2 text-[10px] bg-white/90 text-purple-700 border border-purple-200 px-2 py-0.5 rounded font-semibold">Terror/Suspense</span>
                </div>
                <h3 class="font-bold text-sm text-slate-800 group-hover:text-brand-600 transition-colors line-clamp-1">Telefone Preto</h3>
                <p class="text-xs text-slate-500 mt-1">Sala 01 • Legendado</p>
              </div>
              <div class="mt-4 pt-3 border-t border-slate-100 space-y-3">
                <div class="flex justify-between items-center text-xs">
                  <span class="text-slate-500">Preço Padrão:</span>
                  <span class="font-bold text-slate-800">R$ 30,00</span>
                </div>
                <div class="w-full py-2 px-3 rounded-xl bg-slate-100 text-slate-700 font-semibold text-xs text-center peer-checked:bg-brand-600 peer-checked:text-white transition-all flex items-center justify-center gap-2">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Selecionar Filme</span>
                </div>
              </div>
            </div>
          </label>

        </div>

        <!-- Seção de Dados do Comprador -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-sm">
          <h2 class="text-md font-bold text-slate-900 flex items-center gap-2 border-b border-slate-100 pb-3">
            <i class="fa-solid fa-user-gear text-brand-600"></i>
            Informações da Compra
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Campo de entrada do Nome do Comprador -->
            <div class="space-y-1.5">
              <label for="nome" class="text-xs font-semibold text-slate-700">Nome do Cliente</label>
              <div class="relative">
                <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 pl-10 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition-all">
                <i class="fa-regular fa-user absolute left-3.5 top-3.5 text-slate-400 text-xs"></i>
              </div>
            </div>

            <!-- Campo somente leitura que reflete o filme selecionado nos cards -->
            <div class="space-y-1.5">
              <label for="filme" class="text-xs font-semibold text-slate-700">Filme Selecionado</label>
              <div class="relative">
                <input type="text" id="filme" name="filme" placeholder="Nenhum filme selecionado" readonly class="w-full bg-slate-100/70 border border-slate-200 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium text-brand-600 focus:outline-none cursor-not-allowed">
                <i class="fa-solid fa-film absolute left-3.5 top-3.5 text-slate-400 text-xs"></i>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- COLUNA DIREITA: Painel de Resumo e Cálculo do Valor -->
      <section class="lg:col-span-5 xl:col-span-4 space-y-6">
        <div class="bg-white/90 border border-slate-200 rounded-2xl p-6 space-y-6 sticky top-6 shadow-md backdrop-blur-md">
          <h2 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-4 flex items-center justify-between">
            <span>Resumo da Reserva</span>
            <i class="fa-solid fa-ticket text-brand-600"></i>
          </h2>

          <div class="space-y-4">
            <!-- Controle numérico de quantidade de ingressos (+ e -) -->
            <div class="space-y-1.5">
              <label for="qtd_ingresso" class="text-xs font-semibold text-slate-700">Quantidade de Ingressos</label>
              <div class="flex items-center gap-2">
                <button type="button" onclick="adjustQty(-1)" class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 text-slate-700 hover:bg-slate-200 active:scale-95 transition flex items-center justify-center">
                  <i class="fa-solid fa-minus text-xs"></i>
                </button>
                <input type="number" id="qtd_ingresso" name="qtd_ingresso" value="1" min="1" max="10" required onchange="calculateTotal()" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2 text-center text-sm font-bold text-slate-800 focus:outline-none focus:border-brand-600">
                <button type="button" onclick="adjustQty(1)" class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 text-slate-700 hover:bg-slate-200 active:scale-95 transition flex items-center justify-center">
                  <i class="fa-solid fa-plus text-xs"></i>
                </button>
              </div>
            </div>

            <!-- Seleção da Modalidade do Ingresso (Inteira ou Meia-Entrada) -->
            <div class="space-y-2">
              <label class="text-xs font-semibold text-slate-700">Tipo de Ingresso</label>
              <div class="grid grid-cols-2 gap-2">
                <label class="cursor-pointer">
                  <input type="radio" name="tipo_ingresso" value="inteira" checked onchange="calculateTotal()" class="sr-only peer">
                  <div class="border border-slate-200 bg-slate-50 rounded-xl p-3 text-center transition-all peer-checked:border-brand-600 peer-checked:bg-brand-50 peer-checked:text-brand-700 hover:border-slate-300">
                    <div class="text-xs font-bold">Inteira</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">100% do Valor</div>
                  </div>
                </label>

                <label class="cursor-pointer">
                  <input type="radio" name="tipo_ingresso" value="meia" onchange="calculateTotal()" class="sr-only peer">
                  <div class="border border-slate-200 bg-slate-50 rounded-xl p-3 text-center transition-all peer-checked:border-brand-600 peer-checked:bg-brand-50 peer-checked:text-brand-700 hover:border-slate-300">
                    <div class="text-xs font-bold">Meia-Entrada</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">50% de Desconto</div>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <div class="border-t border-slate-100 my-4"></div>

          <!-- Detalhamento de Valores (Subtotal, Desconto e Total) -->
          <div class="space-y-2.5 text-xs">
            <div class="flex justify-between text-slate-600">
              <span>Subtotal ingressos</span>
              <span id="summary-subtotal" class="font-semibold text-slate-800">R$ 30,00</span>
            </div>
            <div class="flex justify-between text-emerald-600">
              <span class="flex items-center gap-1"><i class="fa-solid fa-tag"></i> Desconto Promo (10%)</span>
              <span id="summary-discount" class="font-semibold">- R$ 3,00</span>
            </div>
            <div class="border-t border-slate-100 pt-3 mt-3 flex justify-between items-center text-sm font-bold text-slate-900">
              <span>Total Final</span>
              <span id="summary-total" class="text-lg text-brand-600">R$ 27,00</span>
            </div>
          </div>

          <!-- Botão de Envio do Formulário -->
          <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-brand-600 to-brand-700 text-white font-bold text-sm shadow-lg shadow-brand-600/25 hover:from-brand-700 hover:to-brand-800 active:scale-[0.99] transition-all flex items-center justify-center gap-2 group">
            <i class="fa-solid fa-credit-card group-hover:scale-110 transition-transform"></i>
            <span>Finalizar Compra</span>
          </button>

          <p class="text-[10px] text-center text-slate-400">
            <i class="fa-solid fa-lock mr-1"></i> Pagamento 100% seguro e instantâneo
          </p>
        </div>
      </section>

    </form>

  </div>

  <!-- LÓGICA JAVASCRIPT: Manipulação dinâmica do formulário e cálculo dos ingressos -->
  <script>
    // Variável global para armazenar o preço unitário do filme atualmente selecionado
    let currentPrice = 30;

    /**
     * Atualiza o campo de input e o estado global quando um filme é clicado.
     * @param {string} id - Identificador do filme
     * @param {string} title - Nome do filme a ser exibido no input
     * @param {number} price - Preço base do ingresso para este filme
     */
    function selectMovie(id, title, price) {
      document.getElementById('filme').value = title;
      currentPrice = price;
      calculateTotal(); // Recalcula os valores sempre que mudar o filme
    }

    /**
     * Incrementa ou decrementa a quantidade de ingressos respeitando os limites [1, 10].
     * @param {number} delta - Valor a somar/subtrair (+1 ou -1)
     */
    function adjustQty(delta) {
      const qtyInput = document.getElementById('qtd_ingresso');
      let val = parseInt(qtyInput.value) || 1;
      val += delta;

      // Garante que a quantidade fique entre 1 e 10
      if (val >= 1 && val <= 10) {
        qtyInput.value = val;
        calculateTotal(); // Recalcula o total após a mudança de quantidade
      }
    }

    /**
     * Realiza o cálculo matemático do subtotal, desconto de 10% e valor final,
     * atualizando os elementos na interface do usuário.
     */
    function calculateTotal() {
      // Obtém a quantidade selecionada (padrão é 1 se estiver vazio/inválido)
      const qty = parseInt(document.getElementById('qtd_ingresso').value) || 1;
      
      // Verifica se a opção "Meia-Entrada" está selecionada
      const isMeia = document.querySelector('input[name="tipo_ingresso"]:checked')?.value === 'meia';
      
      // Define o valor base unitário (se for meia, aplica 50% de desconto)
      let baseTicketPrice = currentPrice;
      if (isMeia) {
        baseTicketPrice = currentPrice / 2;
      }

      // Cálculos financeiros
      const subtotal = baseTicketPrice * qty; // Valor bruto
      const discount = subtotal * 0.10;       // Cupom automático de 10%
      const total = subtotal - discount;      // Valor a pagar

      // Formatação e renderização na tela com padrão de moeda brasileira (R$ 0,00)
      document.getElementById('summary-subtotal').innerText = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
      document.getElementById('summary-discount').innerText = `- R$ ${discount.toFixed(2).replace('.', ',')}`;
      document.getElementById('summary-total').innerText = `R$ ${total.toFixed(2).replace('.', ',')}`;
    }

    // Executa o cálculo inicial assim que a página é carregada por completo
    window.onload = function() 