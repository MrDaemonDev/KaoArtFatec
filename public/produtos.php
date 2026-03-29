<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../config/database.php'; 
?>

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
        body {
            padding-top: 70px;
        }

        .text-roxo {
            color: #8a2be2 !important;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><img src="img/etc/passaroKao.png" alt="logotipo KaoArt" id="passaro" /></a>
        <a class="navbar-brand fw-bold" href="index.php">Kao Art</a>

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

                <?php if (isset($_SESSION['user_id'])): ?>
                <div class="d-flex align-items-center gap-3 ms-3 border-start ps-4">
                    <button class="btn btn-outline-light btn-sm position-relative" type="button">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">Novos alertas</span>
                        </span>
                    </button>
                    
                    <div class="dropdown ms-1">
                        <button class="d-flex align-items-center text-white border-0 bg-transparent p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none;">
                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 32px; height: 32px; background-color: #5e219c; font-size: 0.85rem;">
                                AD
                            </div>
                            <i class="bi bi-chevron-down ms-1" style="font-size: 0.75rem;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li>
                                <a class="dropdown-item py-2 text-dark" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/configuracao.php">
                                    <i class="bi bi-gear me-2"></i>Configurações
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger py-2" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/../backend/auth/logout.php">
                                    <i class="bi bi-box-arrow-right me-2 text-danger"></i>Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<section class="pt-4 pb-5 mt-3">
    <div class="container">
        <div class="mb-4 text-center">
            <button class="btn btn-outline-secondary filtro active btn-sm m-1" data-filter="all">Todos</button>
            <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="camiseta">Apenas Blusas</button>
            <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="caneca">Apenas Canecas</button>
            <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="cartao">Apenas Cartões</button>
            <button class="btn btn-outline-secondary filtro btn-sm m-1" data-filter="mascara">Apenas Máscaras</button>
        </div>

        <div class="row g-4">

            <?php
            $sql = "SELECT * FROM produtos";
            $resultado = mysqli_query($conn, $sql);

            while ($produto = mysqli_fetch_assoc($resultado)) {
                ?>

                <div class="col-md-3 col-sm-6 produto" data-category="<?php echo $produto['categoria']; ?>">
                    <div class="card h-100 shadow-sm border border-2 rounded">
                        <div class="ratio ratio-1x1">
                            <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>"
                                 class="card-img-top object-fit-cover rounded-top">
                        </div>
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fs-6 fw-bold"><?php echo $produto['nome']; ?></h5>
                            <p class="card-text text-muted small flex-grow-1"><?php echo $produto['descricao']; ?></p>
                            <p class="fw-bold text-roxo mb-3 preco">
                                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                <?php if ($produto['unidade']): ?>
                                    <span class="small text-muted fw-normal">- <?php echo $produto['unidade']; ?></span>
                                <?php endif; ?>
                            </p>
                            <a href="carrinho.php" class="btn btn-primary btn-sm w-100 add-to-cart mt-auto">Adicionar ao Carrinho</a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</section>

<footer>
    <p>&copy; KaoArt 2026. Todos os direitos reservados.</p>
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