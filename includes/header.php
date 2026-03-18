<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
        <img src="../public/img/etc/passaroKao.png" alt="logotipo KaoArt" id="passaro" />
        <a class="navbar-brand fw-bold" href="#">KaoArt</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'index.php' ? 'active' : '' ?>" href="index.php">Início</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'produtos.php' ? 'active' : '' ?>" href="produtos.php">Produtos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'contatos.php' ? 'active' : '' ?>" href="contatos.php">Contatos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'portfolio.php' ? 'active' : '' ?>" href="portfolio.php">Portfólio</a>
                </li>
            </ul>




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