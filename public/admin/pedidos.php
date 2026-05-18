<?php

require '../../backend/auth/validAdmin.php';
require '../../config/database.php';

$baseURL = '.';

$sql = "
SELECT
    p.id,
    p.user_id,
    u.nome_completo,
    p.total_valor,
    p.status,
    p.data_pedido
FROM pedidos p
JOIN usuarios u
    ON p.user_id = u.id
ORDER BY p.data_pedido DESC
";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Admin KaoArt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .btn-ver-detalhes {
            background-color: transparent;
            color: #5e219c;
            border: none;
        }

        .btn-ver-detalhes:hover {
            background-color: #f0f0f0;
            color: #4a197c;
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
                    <input type="text" class="search-bar" placeholder="Buscar pedidos...">
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
                    <h1 class="h3 text-dark mb-1">Pedidos</h1>
                    <p class="text-muted">Gerencie todos os pedidos da loja</p>
                </div>

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase text-muted small fw-semibold py-3 px-4">ID do Pedido</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Cliente</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Data</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Valor</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Status</th>
                                    <th class="text-uppercase text-muted small fw-semibold py-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php while ($pedido = mysqli_fetch_assoc($resultado)): ?>
                                    <tr>
                                        <td class="px-4 fw-medium text-dark">#<?php echo $pedido['id']; ?></td>
                                        <td class="text-dark fw-medium"><?php echo $pedido['nome_completo']; ?></td>
                                        <td class="text-muted">
                                            <?php echo date('d/m/Y', strtotime($pedido['data_pedido'])); ?>
                                        </td>
                                        <td class="text-dark fw-semibold">R$
                                            <?php echo number_format($pedido['total_valor'], 2, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $status = $pedido['status'];
                                            $badgeClass = '';

                                            if ($status === 'Pendente') {
                                                $badgeClass = 'badge bg-warning text-warning ';
                                            } elseif ($status === 'Em Produção') {
                                                $badgeClass = 'badge bg-primary text-primary';
                                            } elseif ($status === 'Enviado') {
                                                $badgeClass = 'badge bg-success text-success';
                                            } elseif ($status === 'Arte Aprovada') {
                                                $badgeClass = 'badge bg-success text-success';
                                            } elseif ($status === 'Cancelado') {
                                                $badgeClass = 'badge bg-danger text-danger';
                                            }
                                            ?>
                                            <span
                                                class="badge <?php echo $badgeClass; ?> bg-opacity-10 border-0 rounded-pill px-3 py-2">
                                                <?php echo $status; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="detalhes.php?id=<?php echo $pedido['id']; ?>"
                                                class="btn btn-sm btn-ver-detalhes" title="Ver detalhes">
                                                <i class="bi bi-eye me-2"></i>Ver Detalhes
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
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