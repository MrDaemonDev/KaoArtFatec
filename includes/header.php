<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

    <!-- O Javascript do Bootstrap foi removido daqui para evitar conflitos, pois já é carregado no rodapé das páginas! -->
    <title>Kao Art</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/index.php">
                <img src="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/img/etc/passaroKao.png"
                    alt="logotipo KaoArt" id="passaro" />
            </a>
            <a class="navbar-brand fw-bold" href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/index.php">Kao
                Art</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'index.php' ? 'active' : '' ?>"
                            href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'produtos.php' ? 'active' : '' ?>"
                            href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'contatos.php' ? 'active' : '' ?>"
                            href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/contatos.php">Contatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'portfolio.php' ? 'active' : '' ?>"
                            href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/portfolio.php">Portfólio</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/login.php"
                        class="btn btn-outline-light btn-sm me-2"><i class="bi bi-person-circle"></i></a>
                    <a href="<?php echo isset($baseURL) ? $baseURL : '../public'; ?>/carrinho.php"
                        class="btn btn-outline-light btn-sm position-relative">
                        <i class="bi bi-cart"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                    </a>
                    <a href="https://www.instagram.com/kaao_art/" class="btn btn-outline-light btn-sm ms-2"
                        target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="d-flex align-items-center gap-3 ms-3 border-start ps-4">
                        <button class="btn btn-outline-light btn-sm position-relative" type="button">
                            <i class="bi bi-bell"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
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