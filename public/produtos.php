<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/pegarProduto.js" defer></script>

  <title>Produtos - KaoArt</title>

  <style>
    /* Ajuste para o menu fixo não cobrir o topo */
    body {
      padding-top: 70px;
    }

    /* Cor roxa para o preço */
    .text-roxo {
      color: #8a2be2 !important;
    }
  </style>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php"><img src="img/etc/passaroKao.png" alt="logotipo KaoArt" id="passaro" /></a>
      <a class="navbar-brand fw-bold" href="index.php">KaoArt</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link active" href="produtos.php">Produtos</a></li>
          <li class="nav-item"><a class="nav-link" href="contatos.php">Contatos</a></li>
          <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfólio</a></li>
        </ul>

        <form class="d-flex me-3" role="search">
          <input id="buscarProduto" class="form-control form-control-sm" type="search" placeholder="Buscar produtos..."
            aria-label="Search">
          <button class="btn btn-outline-light btn-sm ms-2" type="submit"><i class="bi bi-search"></i></button>
        </form>


        <div class="d-flex align-items-center">
          <a href="login.php" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-person-circle"></i></a>
          <a href="carrinho.php" class="btn btn-outline-light btn-sm position-relative">
            <i class="bi bi-cart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
          </a>
          <a href="https://www.instagram.com/kaao_art/" class="btn btn-outline-light btn-sm ms-2" target="_blank">
            <i class="bi bi-instagram"></i>
          </a>

        </div>
      </div>
    </div>
  </nav>


  <section class="pt-4 pb-5 mt-3">
    <div class="container">
      <div class="mb-4 text-center">
        <button class="btn btn-outline-secondary filtro active btn-sm m-1" data-filter="all">Todos</button>
        <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="blusa">Apenas Blusas</button>
        <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="caneca">Apenas Canecas</button>
        <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="cartao">Apenas Cartões</button>
        <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="mascara">Apenas Máscaras</button>
      </div>

      <div class="row g-4">

        <div class="col-md-3 col-sm-6 produto" data-category="blusa">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/roupas/camisa6t.png" alt="Camiseta Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Camiseta Premium</h5>
              <p class="card-text text-muted small flex-grow-1">100% algodão, confortável e durável.</p>
              <p class="fw-bold text-roxo mb-3">R$ 49,90</p>
              <a href="#" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="cartao">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/cartao/cartao1.png" alt="Cartões de visita"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Cartões de visita</h5>
              <p class="card-text text-muted small flex-grow-1">Para você divugar o que quiser!!!</p>
              <p class="fw-bold text-roxo mb-3">R$ 19,90 <span class="small text-muted fw-normal">- 200 un</span></p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="caneca">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/caneca/caneca4.jpeg" alt="Caneca Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Caneca Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Porcelana com impressão de alta qualidade.</p>
              <p class="fw-bold text-roxo mb-3">R$ 29,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="mascara">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/mascara/mascara1.png" alt="Mascaras" class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Mascaras</h5>
              <p class="card-text text-muted small flex-grow-1">Para os seus dias de gripe!</p>
              <p class="fw-bold text-roxo mb-3">R$ 14,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="caneca">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/caneca/caneca1.jpeg" alt="Caneca Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Caneca Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Porcelana com impressão de alta qualidade do Superman.
              </p>
              <p class="fw-bold text-roxo mb-3">R$ 29,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="caneca">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/caneca/caneca2.jpeg" alt="Caneca Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Caneca Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Caneca de Porcelana.</p>
              <p class="fw-bold text-roxo mb-3">R$ 29,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="cartao">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/cartao/cartao2.png" alt="Cartões de visita"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Cartões de visita</h5>
              <p class="card-text text-muted small flex-grow-1">Para você divugar o que quiser!!!</p>
              <p class="fw-bold text-roxo mb-3">R$ 19,90 <span class="small text-muted fw-normal">- 200 un</span></p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="blusa">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/roupas/camisa5.png" alt="Camisa Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Camisa Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Camisa de algodão com estampa personalizada.</p>
              <p class="fw-bold text-roxo mb-3">R$ 39,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="caneca">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/caneca/caneca3.jpeg" alt="Caneca Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Caneca Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Porcelana com impressão de alta qualidade.</p>
              <p class="fw-bold text-roxo mb-3">R$ 29,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="mascara">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/mascara/mascara3.png" alt="mascara Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Máscara Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Máscara de tecido com impressão de alta qualidade.</p>
              <p class="fw-bold text-roxo mb-3">R$ 29,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="caneca">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/caneca/caneca6.jpeg" alt="Caneca Personalizada"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Caneca Personalizada</h5>
              <p class="card-text text-muted small flex-grow-1">Porcelana com impressão de alta qualidade.</p>
              <p class="fw-bold text-roxo mb-3">R$ 29,90</p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 produto" data-category="cartao">
          <div class="card h-100 shadow-sm border border-2 rounded">
            <div class="ratio ratio-1x1">
              <img src="img/cartao/cartao3.png" alt="Cartões de visita"
                class="card-img-top object-fit-cover rounded-top">
            </div>
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fs-6 fw-bold">Cartões de visita</h5>
              <p class="card-text text-muted small flex-grow-1">Para você divugar o que quiser!!!</p>
              <p class="fw-bold text-roxo mb-3">R$ 19,90 <span class="small text-muted fw-normal">- 200 un</span></p>
              <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer>
    <p>&copy; KaoArt 2025. Todos os direitos reservados.</p>
  </footer>

  <script>
    const buttons = document.querySelectorAll('.filtro');
    const produtos = document.querySelectorAll('.produto');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');

        produtos.forEach(prod => {
          if (filter === 'all' || prod.getAttribute('data-category') === filter) {
            prod.classList.remove('d-none');
          } else {
            prod.classList.add('d-none');
          }
        });
      });
    });

    const campoBusca = document.getElementById("buscarProduto");


    campoBusca.addEventListener("keyup", function () {

      const texto = campoBusca.value.toLowerCase();

      produtos.forEach(produto => {

        const nome = produto.querySelector(".card-title").textContent.toLowerCase();

        if (nome.includes(texto)) {
          produto.classList.remove("d-none");
        } else {
          produto.classList.add("d-none");
        }

      });

    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>