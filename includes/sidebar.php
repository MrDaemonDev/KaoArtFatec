<?php
$currentAdminPage = basename($_SERVER['PHP_SELF']);
$adminPages = [
    'dashboard.php' => 'Visão Geral',
    'produtos.php' => 'Produtos'
];
?>

<style>
    body { 
        background-color: #F8F9FA; 
        overflow: hidden; 
    }
    
    .wrapper {
        display: flex;
        height: 100vh;
    }
    
    .sidebar-kao { 
        background-color: #ab79d1; 
        width: 260px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        z-index: 1000;
    }
    .sidebar-menu {
        flex-grow: 1;
        overflow-y: auto;
    }
    .nav-link { 
        color: rgba(255, 255, 255, 0.8); 
        padding: 12px 20px;
        margin: 4px 16px;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .nav-link:hover { 
        color: #ffffff; 
        background-color: rgba(255,255,255,0.1); 
    }
    .nav-link.active { 
        background-color: #b892ff; 
        color: #5e219c !important; 
        font-weight: bold; 
    }
    
    .top-header {
        background-color: #ffffff;
        border-bottom: 1px solid #e9ecef;
        z-index: 900;
    }
    .search-bar {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 8px 16px 8px 40px;
        width: 100%;
        max-width: 400px;
    }
    .search-wrapper {
        position: relative;
    }
    .search-wrapper .bi-search {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
        background-color: #b892ff;
    }
    
    .btn-roxo-sair {
        background-color: #b892ff;
        color: #5e219c;
        font-weight: bold;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-roxo-sair:hover {
        background-color: #cdaeff;
        color: #310c59; 
    }

    .main-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
    .scrollable-content {
        flex-grow: 1;
        overflow-y: auto;
        padding: 2rem;
    }

    .icon-box {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }
</style>

<aside class="sidebar-kao">
    <div class="p-4 border-bottom border-secondary border-opacity-25 d-flex align-items-center gap-3">
        <img src="../img/etc/passaroKao.png" alt="KaoArt Logo" width="80">
        <h4 class="text-white mb-0 fs-5">KaoArt Admin</h4>
    </div>
    
    <nav class="sidebar-menu py-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo $currentAdminPage == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                    <i class="bi bi-grid-1x2 me-2"></i> Visão Geral
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $currentAdminPage == 'produtos.php' ? 'active' : ''; ?>" href="produtos.php">
                    <i class="bi bi-box-seam me-2"></i> Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $currentAdminPage == 'pedidos.php' ? 'active' : ''; ?>" href="pedidos.php">
                    <i class="bi bi-cart3 me-2"></i> Pedidos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $currentAdminPage == 'artes.php' ? 'active' : ''; ?>" href="artes.php">
                    <i class="bi bi-image me-2"></i> Aprovação de Artes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $currentAdminPage == 'estoque.php' ? 'active' : ''; ?>" href="estoque.php">
                    <i class="bi bi-shop me-2"></i> Estoque
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $currentAdminPage == 'clientes.php' ? 'active' : ''; ?>" href="clientes.php">
                    <i class="bi bi-people me-2"></i> Clientes
                </a>
            </li>
        </ul>
    </nav>

    <div class="p-3 border-top border-secondary border-opacity-25">
        <div class="d-flex align-items-center gap-3 mb-3 px-2">
            <div class="avatar-circle">AD</div>
            <div class="text-white">
                <p class="mb-0 fs-6 fw-semibold">Administrador</p>
                <p class="mb-0 small text-white-50">admin@kaoart.com</p>
            </div>
        </div>
        <a href="../../backend/auth/logout.php" class="btn w-100 btn-roxo-sair shadow-sm">
            <i class="bi bi-box-arrow-left me-2"></i> Sair
        </a>
    </div>
</aside>
