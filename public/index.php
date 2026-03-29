<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <title>KaoArt - Estamparia</title>
</head>

<body>

<?php
    include ("../includes/header.php");
?>

  <section class="hero" id="inicio">
    <div class="container">
      <h1>Bem-vindos à KaoArt</h1>
      <p class="lead mt-3">Transformamos suas ideias em estampas únicas e personalizadas com qualidade premium e designs
        exclusivos.</p>
      <a href="produtos.php" class="btn btn-light mt-3">Ver Produtos</a>
    </div>
  </section>

  <!-- SEÇÃO DE CONHEÇA NOSSOS PRODUTOS -->
  <section class="hero3 py-5" id="Meio">
    <div class="container">
      <div class="row align-items-center">

        <!-- CARROSSEL (ESQUERDA) -->
        <div class="col-md-6">
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/caneca/caneca3.jpeg" class="d-block w-100 rounded" alt="">
              </div>

              <div class="carousel-item" data-bs-interval="3000">
                <img src="img/roupas/camisa4.png" class="d-block w-100 rounded" alt="">
              </div>

              <div class="carousel-item">
                <img src="img/roupas/camisa6.png" class="d-block w-100 rounded" alt="">
              </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
              data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>

          </div>
        </div>

        <!-- TEXTO (DIREITA) -->
        <div class="col-md-6 text-center text-md-start mt-4 mt-md-0">
          <h2>Conheça mais nossos produtos</h2>
          <p class="lead">
            Clique no botão abaixo e explore nosso portfólio completo com
            estampas exclusivas e personalizadas.
          </p>

          <a href="/public/portfolio.php" class="btn btn-dark btn-lg mt-3">
            Ver Portfólio
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- SEÇÃO DE  PQ ESCOLHER A KAO ART -->
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-5" style="color: rgb(118, 78, 156);">Por que escolher a KaoArt?</h2>

        <div class="row">

          <div class="col-md-4">
            <i class="bi bi-palette fs-1 text-dark"></i>
            <h5 class="mt-3" style="color: rgb(118, 78, 156);">Design Exclusivo</h5>
            <p>Estampas criativas feitas sob medida.</p>
          </div>

          <div class="col-md-4 mt-4 mt-md-0">
            <i class="bi bi-award fs-1 text-dark"></i>
            <h5 class="mt-3" style="color: rgb(118, 78, 156);">Alta Qualidade</h5>
            <p>Materiais premium e acabamento impecável.</p>
          </div>

          <div class="col-md-4 mt-4 mt-md-0">
            <i class="bi bi-people fs-1 text-dark"></i>
            <h5 class="mt-3" style="color: rgb(118, 78, 156);">Atendimento Personalizado</h5>
            <p>Estamos sempre prontos para atender você.</p>
          </div>

        </div>
    </div>
  </section>



  <!-- SEÇÃO DE SOBRE NÓS -->
  <section class="py-5" id="sobre-nos">
    <div class="container">
      <div class="row align-items-center">

        <!-- Coluna do Texto (esquerda) -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="text-purple mb-4" style="color: rgb(118, 78, 156);">Sobre Nós</h2>
          <p>
            Somos uma Estamparia e <strong style="color: rgb(153, 95, 207);">Gráfica 100% online</strong> que tem como
            propósito superar as expectativas dos nossos clientes com excelência em tudo que fazemos.
            Acreditamos que cada detalhe faz a diferença, por isso unimos tecnologia, criatividade e dedicação para
            transformar ideias em produtos únicos e de alta qualidade.
          </p>
          <p>
            Nossa missão é sempre entregar produtos de qualidade, visando um atendimento diferenciado e agilidade para
            mantermos a pontualidade com cada pedido.
            Trabalhamos com foco total na satisfação de quem confia em nosso trabalho, buscando sempre aprimorar nossos
            processos e oferecer uma experiência simples, prática e inspiradora.
          </p>
          <p>
            Nossa visão é estar entre as melhores gráficas de São Paulo, mostrando sempre os nossos valores através da
            nossa criatividade, empatia, comprometimento e eficiência em tudo o que realizamos — e, acima de tudo, com
            amor pelo que fazemos.
          </p>
          <p style="color: rgb(153, 103, 199);">Obrigado por escolher a KaoArt. Estamos ansiosos para fazer parte da sua
            jornada criativa!</p>
        </div>

        <!-- Coluna do Carrossel (direita) -->
        <div class="col-lg-6">
          <div id="sobreCarousel" class="carousel slide rounded shadow" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/cartao/cartao4.png" class="d-block w-100 rounded" alt="Cartão de Visitas">
              </div>
              <div class="carousel-item">
                <img src="img/mascara/mascara5.png" class="d-block w-100 rounded" alt="Máscara">
              </div>
              <div class="carousel-item active">
                <img src="img/cartao/cartao1.png" class="d-block w-100 rounded" alt="Cartão de Visitas">
              </div>
              <div class="carousel-item active">
                <img src="img/roupas/camisa1.png" class="d-block w-100 rounded" alt="Cartão de Visitas">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#sobreCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon rounded-circle p-2" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sobreCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon rounded-circle p-2" aria-hidden="true"></span>
              <span class="visually-hidden">Próximo</span>
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- SEÇÃO DE avaliações -->
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-5" style="color: rgb(186, 151, 219);">O que nossos clientes dizem</h2>

      <div class="row">

        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <p>"A qualidade é incrível! Super recomendo."</p>
              <h6 class="mt-3 mb-0">— Ana Souza</h6>
            </div>
          </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <p>"Atendimento excelente e entrega rápida."</p>
              <h6 class="mt-3 mb-0">— Carlos Lima</h6>
            </div>
          </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <p>"Minha estampa ficou perfeita!"</p>
              <h6 class="mt-3 mb-0">— Mariana Alves</h6>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- SEÇÃO DE PERGUNTAS FREQUENTES -->
  <section class="py-5 bg-light" id="faq">
    <div class="container">
      <h2 class="text-center mb-5">Perguntas Frequentes</h2>

      <div class="row">

        <!-- COLUNA ESQUERDA -->
        <div class="col-md-6">
          <div class="accordion accordion-flush" id="faqLeft">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed custom-accordion" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq1">
                  Como faço um pedido personalizado?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                <div class="accordion-body">
                  Você pode enviar sua arte ou ideia pelo nosso WhatsApp ou Instagram.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed custom-accordion" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq2">
                  Qual o prazo de produção?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqLeft">
                <div class="accordion-body">
                  O prazo varia entre 3 a 7 dias úteis dependendo do produto.
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- COLUNA DIREITA -->
        <div class="col-md-6">
          <div class="accordion accordion-flush" id="faqRight">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed custom-accordion" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq3">
                  Vocês entregam para todo o Brasil?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqRight">
                <div class="accordion-body">
                  Sim! Enviamos para todo o território nacional.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed custom-accordion" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq4">
                  Quais formas de pagamento são aceitas?
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqRight">
                <div class="accordion-body">
                  Aceitamos PIX, cartão de crédito e débito.
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <footer>
    <p>&copy; KaoArt 2026. Todos os direitos reservados.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>