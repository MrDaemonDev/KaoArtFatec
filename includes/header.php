<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS e icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/css/style.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <title>KaoArt</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/index.php">
            <img src="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/img/etc/passaroKao.png" alt="logotipo KaoArt" id="passaro" />
        </a>
        <a class="navbar-brand fw-bold" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/index.php">KaoArt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'index.php' ? 'active' : '' ?>" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'produtos.php' ? 'active' : '' ?>" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'contatos.php' ? 'active' : '' ?>" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/contatos.php">Contatos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'portfolio.php' ? 'active' : '' ?>" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/portfolio.php">Portfólio</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/login.php" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-person-circle"></i></a>
                <a href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/carrinho.php" class="btn btn-outline-light btn-sm position-relative">
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