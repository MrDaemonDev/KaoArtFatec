<?php

require '../../backend/auth/validAdmin.php';
require '../../config/database.php';

$baseURL = '.';

$sqlPedidosPendentes = "SELECT COUNT(*) AS total FROM pedidos WHERE status = 'Pendente'";
$result = mysqli_query($conn, $sqlPedidosPendentes);

$pedidosPendentes = $result ? (int) mysqli_fetch_assoc($result)['total'] : 0;

$sqlProdutosBaixa = "SELECT COUNT(*) AS total FROM produtos WHERE estoque <= 5";
$result = mysqli_query($conn, $sqlProdutosBaixa);

$produtosBaixa = $result ? (int) mysqli_fetch_assoc($result)['total'] : 0;

$sqlFaturamento = "
SELECT SUM(total_valor) AS total
FROM pedidos
WHERE status <> 'Cancelado'
  AND MONTH(data_pedido) = MONTH(CURRENT_DATE())
  AND YEAR(data_pedido) = YEAR(CURRENT_DATE())
";
$result = mysqli_query($conn, $sqlFaturamento);

$faturamento = $result ? (float) mysqli_fetch_assoc($result)['total'] : 0;

$sqlUltimosPedidos = "
SELECT p.id, p.total_valor, p.status, p.data_pedido, u.nome_completo
FROM pedidos p
JOIN usuarios u ON p.user_id = u.id
ORDER BY p.data_pedido DESC
LIMIT 10
";
$resultUltimosPedidos = mysqli_query($conn, $sqlUltimosPedidos);

function getStatusBadgeClass($status)
{
    switch ($status) {
        case 'Pendente':
            return 'bg-warning bg-opacity-10 text-warning';
        case 'Em Produção':
            return 'bg-primary bg-opacity-10 text-primary';
        case 'Enviado':
            return 'bg-success bg-opacity-10 text-success';
        case 'Arte Aprovada':
            return 'bg-success bg-opacity-10 text-success';
        case 'Cancelado':
            return 'bg-danger bg-opacity-10 text-danger';
        default:
            return 'bg-secondary bg-opacity-10 text-secondary';
    }
}

function formatMoney($amount)
{
    return 'R$ ' . number_format($amount, 2, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - KaoArt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <?php include("../../includes/sidebar.php"); ?>

        <div class="main-content">

            <header class="top-header p-3 px-4 d-flex justify-content-between align-items-center shadow-sm">
                <div class="search-wrapper flex-grow-1">
                    <i class="bi bi-search"></i>
                    <input type="text" class="search-bar" placeholder="Buscar pedidos, produtos, clientes...">
                </div>

                <div class="d-flex align-items-center gap-4 ms-3 border-start ps-4">
                    <button class="btn btn-light position-relative border-0 rounded-circle p-2">
                        <i class="bi bi-bell fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">Novos alertas</span>
                        </span>
                    </button>
                    <div class="avatar-circle" style="background-color: #5e219c;">AD</div>
                </div>
            </header>

            <main class="scrollable-content">

                <div class="mb-4">
                    <h1 class="h3 text-dark mb-1">Visão Geral</h1>
                    <p class="text-muted">Acompanhe o desempenho da sua loja</p>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow-sm border-0 h-100 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center p-4">
                                <div>
                                    <p class="text-muted mb-1 small fw-semibold">Pedidos Pendentes</p>
                                    <h3 class="mb-0 text-dark fw-bold"><?php echo $pedidosPendentes; ?></h3>
                                </div>
                                <div class="icon-box bg-warning bg-opacity-10">
                                    <i class="bi bi-cart-fill text-warning fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow-sm border-0 h-100 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center p-4">
                                <div>
                                    <p class="text-muted mb-1 small fw-semibold">Artes para Aprovar</p>
                                    <h3 class="mb-0 text-dark fw-bold">8</h3>
                                </div>
                                <div class="icon-box bg-primary bg-opacity-10">
                                    <i class="bi bi-image text-primary fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow-sm border-0 h-100 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center p-4">
                                <div>
                                    <p class="text-muted mb-1 small fw-semibold">Faturamento do Mês</p>
                                    <h3 class="mb-0 text-dark fw-bold"><?php echo formatMoney($faturamento); ?></h3>
                                </div>
                                <div class="icon-box bg-success bg-opacity-10">
                                    <i class="bi bi-currency-dollar text-success fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow-sm border-0 h-100 rounded-4">
                            <div class="card-body d-flex justify-content-between align-items-center p-4">
                                <div>
                                    <p class="text-muted mb-1 small fw-semibold">Produtos em Baixa</p>
                                    <h3 class="mb-0 text-dark fw-bold"><?php echo $produtosBaixa; ?></h3>
                                </div>
                                <div class="icon-box bg-danger bg-opacity-10">
                                    <i class="bi bi-box-seam text-danger fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h5 class="mb-0 text-dark fw-bold">Últimos Pedidos</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase text-muted small fw-semibold py-3 px-4">ID do Pedido</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Cliente</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Data</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Valor</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php if ($resultUltimosPedidos && mysqli_num_rows($resultUltimosPedidos) > 0): ?>
                                    <?php while ($pedido = mysqli_fetch_assoc($resultUltimosPedidos)): ?>
                                        <tr style="cursor: pointer; transition: background-color 0.2s;">
                                            <td class="px-4 fw-medium text-dark">#<?php echo $pedido['id']; ?></td>
                                            <td class="text-dark fw-medium"><?php echo $pedido['nome_completo']; ?></td>
                                            <td class="text-muted">
                                                <?php echo date('d/m/Y', strtotime($pedido['data_pedido'])); ?>
                                            </td>
                                            <td class="text-dark fw-semibold"><?php echo formatMoney($pedido['total_valor']); ?>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge <?php echo getStatusBadgeClass($pedido['status']); ?> border-0 rounded-pill px-3 py-2">
                                                    <?php echo $pedido['status']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Nenhum pedido encontrado.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>