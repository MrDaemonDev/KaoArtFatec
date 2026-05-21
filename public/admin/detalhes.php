<?php

require '../../backend/auth/validAdmin.php';
require '../../config/database.php';

$pedidoId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($pedidoId <= 0) {
    header('Location: pedidos.php');
    exit;
}

$allowedStatuses = [
    'Pendente',
    'Arte Aprovada',
    'Em Produção',
    'Enviado',
    'Cancelado'
];

$statusMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'], $_POST['art_status_action'])) {
    $itemId = intval($_POST['item_id']);
    $action = trim($_POST['art_status_action']);
    $novoStatusArte = $action === 'aprovar' ? 'Aprovada' : 'Reprovada';
    $statusEscaped = mysqli_real_escape_string($conn, $novoStatusArte);
    $sqlUpdateArte = "UPDATE itens_pedidos SET arte_status = '$statusEscaped' WHERE id = $itemId";

    if (mysqli_query($conn, $sqlUpdateArte)) {
        $statusMessage = 'Status da arte atualizado com sucesso.';

        if ($novoStatusArte === 'Aprovada') {
            $sqlTodosAprovados = "SELECT COUNT(*) AS total FROM itens_pedidos WHERE pedido_id = $pedidoId AND arte_status <> 'Aprovada'";
            $resultTodosAprovados = mysqli_query($conn, $sqlTodosAprovados);
            $rowTodosAprovados = mysqli_fetch_assoc($resultTodosAprovados);
            if ($rowTodosAprovados && intval($rowTodosAprovados['total']) === 0) {
                mysqli_query($conn, "UPDATE pedidos SET status = 'Arte Aprovada' WHERE id = $pedidoId");
            }
        }
    } else {
        $statusMessage = 'Erro ao atualizar status da arte: ' . mysqli_error($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $novoStatus = trim($_POST['status']);

    if (in_array($novoStatus, $allowedStatuses, true)) {
        $statusEscaped = mysqli_real_escape_string($conn, $novoStatus);
        $sqlUpdate = "UPDATE pedidos SET status = '$statusEscaped' WHERE id = $pedidoId";

        if (mysqli_query($conn, $sqlUpdate)) {
            $statusMessage = 'Status atualizado com sucesso.';
        } else {
            $statusMessage = 'Erro ao atualizar status: ' . mysqli_error($conn);
        }
    } else {
        $statusMessage = 'Status inválido.';
    }
}

$sqlPedido = "
SELECT p.id,
       p.user_id,
       u.nome_completo,
       u.email,
       u.telefone,
       u.endereco,
       u.cep,
       p.total_valor,
       p.status,
       p.data_pedido
FROM pedidos p
JOIN usuarios u ON p.user_id = u.id
WHERE p.id = $pedidoId
";
$resultPedido = mysqli_query($conn, $sqlPedido);
$pedido = $resultPedido ? mysqli_fetch_assoc($resultPedido) : null;

if (!$pedido) {
    header('Location: pedidos.php');
    exit;
}

$sqlItens = "
SELECT ip.*, pr.nome AS produto_nome, pr.imagem AS produto_imagem
FROM itens_pedidos ip
JOIN produtos pr ON ip.produto_id = pr.id
WHERE ip.pedido_id = $pedidoId
";
$resultItens = mysqli_query($conn, $sqlItens);
$itensPedido = $resultItens ? mysqli_fetch_all($resultItens, MYSQLI_ASSOC) : [];

function statusBadgeClass($status)
{
    switch ($status) {
        case 'Pendente':
            return 'bg-warning text-warning';
        case 'Em Produção':
        case 'Arte Aprovada':
            return 'bg-primary text-primary';
        case 'Enviado':
            return 'bg-success text-success';
        case 'Cancelado':
            return 'bg-danger text-danger';
        default:
            return 'bg-secondary text-secondary';
    }
}

function formatMoney($amount)
{
    return number_format($amount, 2, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido - Admin KaoArt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .info-item i {
            color: #6c757d;
            margin-top: 3px;
        }

        .historico-container {
            max-height: 320px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .historico-item {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .historico-admin {
            background-color: rgba(94, 33, 156, 0.1);
            margin-left: 16px;
        }

        .historico-cliente {
            background-color: rgba(0, 123, 255, 0.1);
            margin-right: 16px;
        }

        .historico-sistema {
            background-color: #f0f0f0;
        }

        .arte-preview {
            aspect-ratio: 1;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .btn-aprovar {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-aprovar:hover {
            background-color: #218838;
            color: white;
        }

        .btn-rejeitar {
            border-color: #fd7e14;
            color: #fd7e14;
        }

        .btn-rejeitar:hover {
            background-color: #fff3cd;
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
                    <input type="text" class="search-bar" placeholder="Buscar...">
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


                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 text-dark mb-1">Detalhes do Pedido #<?php echo $pedido['id']; ?></h1>
                        <p class="text-muted">Realizado em
                            <?php echo date('d/m/Y H:i', strtotime($pedido['data_pedido'])); ?>
                        </p>
                    </div>
                    <span class="badge <?php echo statusBadgeClass($pedido['status']); ?> bg-opacity-10 px-3 py-2"
                        style="font-size: 14px;">
                        <?php echo htmlspecialchars($pedido['status'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </div>

                <?php if (!empty($statusMessage)): ?>
                    <div class="alert alert-info py-2 px-3">
                        <?php echo htmlspecialchars($statusMessage, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <div class="row g-4">

                    <div class="col-lg-8">


                        <div class="card shadow-sm border-0 rounded-4 mb-4">
                            <div class="card-body p-4">
                                <h5 class="card-title text-dark fw-bold mb-4">Informações do Cliente</h5>

                                <div class="info-item">
                                    <i class="bi bi-person"></i>
                                    <span
                                        class="text-dark"><?php echo htmlspecialchars($pedido['nome_completo'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>

                                <div class="info-item">
                                    <i class="bi bi-envelope"></i>
                                    <span
                                        class="text-muted"><?php echo htmlspecialchars($pedido['email'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>

                                <div class="info-item">
                                    <i class="bi bi-telephone"></i>
                                    <span
                                        class="text-muted"><?php echo htmlspecialchars($pedido['telefone'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>

                                <div class="info-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <span
                                        class="text-muted"><?php echo htmlspecialchars($pedido['endereco'], ENT_QUOTES, 'UTF-8'); ?>
                                        - <?php echo htmlspecialchars($pedido['cep'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Itens do Pedido -->
                        <div class="card shadow-sm border-0 rounded-4 mb-4">
                            <div class="card-body p-4">
                                <h5 class="card-title text-dark fw-bold mb-4">Itens do Pedido</h5>

                                <?php if (empty($itensPedido)): ?>
                                    <p class="text-muted">Nenhum item encontrado para este pedido.</p>
                                <?php else: ?>
                                    <?php foreach ($itensPedido as $item): ?>
                                        <?php $subtotal = $item['quantidade'] * $item['preco_unit']; ?>
                                        <div class="border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <p class="mb-1 text-dark" style="font-size: 14px;">
                                                        <?php echo htmlspecialchars($item['produto_nome'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </p>
                                                    <p class="mb-0 text-muted" style="font-size: 12px;">
                                                        Qtd: <?php echo $item['quantidade']; ?> × R$
                                                        <?php echo formatMoney($item['preco_unit']); ?>
                                                    </p>
                                                </div>
                                                <p class="text-dark" style="font-size: 14px;">R$
                                                    <?php echo formatMoney($subtotal); ?>
                                                </p>
                                            </div>

                                        </div>
                                    <?php endforeach; ?>
                                    <div class="d-flex justify-content-between align-items-center pt-3">
                                        <p class="text-dark fw-semibold mb-0">Total</p>
                                        <p class="text-dark fw-bold mb-0" style="font-size: 18px;">R$
                                            <?php echo formatMoney($pedido['total_valor']); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Status do Pedido -->
                        <div class="card shadow-sm border-0 rounded-4 mb-4">
                            <div class="card-body p-4">
                                <h5 class="card-title text-dark fw-bold mb-4">Status do Pedido</h5>

                                <form method="post" action="detalhes.php?id=<?php echo $pedido['id']; ?>">
                                    <div class="mb-3">
                                        <select class="form-select" name="status" aria-label="Mudar status do pedido">
                                            <?php foreach ($allowedStatuses as $statusOption): ?>
                                                <option
                                                    value="<?php echo htmlspecialchars($statusOption, ENT_QUOTES, 'UTF-8'); ?>"
                                                    <?php echo $pedido['status'] === $statusOption ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($statusOption, ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Atualizar Status</button>
                                </form>
                            </div>
                        </div>


                    </div>

                    <!-- Right Column - Art Approval -->

                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="card-title text-dark fw-bold mb-4">Aprovação de Arte</h5>

                                <!-- Art Preview -->

                                <div class="mb-4">
                                    <div class="arte-preview">
                                        <?php if (!empty($item['arte_personalizada'])): ?>
                                            <div class="arte-preview mb-3">
                                                <img src="../uploads/artes/<?php echo htmlspecialchars($item['arte_personalizada'], ENT_QUOTES, 'UTF-8'); ?>"
                                                     alt="Arte do cliente" class="w-100 h-100"
                                                     style="object-fit: cover;">
                                            </div>
                                        <?php else: ?>
                                            <div class="p-3 bg-light rounded-3 text-center text-muted mb-3">
                                                Sem arte personalizada enviada para este item.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Observações -->
                                <div class="p-3 bg-light rounded-3 mb-4">
                                    <p class="mb-2" style="font-size: 12px; color: #6c757d;">Observações do Cliente:</p>
                                    <p class="mb-0" style="font-size: 14px; color: #212529;"><?php echo nl2br(htmlspecialchars($item['observacoes'] ?: 'Nenhuma observação enviada.', ENT_QUOTES, 'UTF-8')); ?></p>

                                </div>

                                <!-- Approval Buttons -->
                                <div class="row g-3 mb-4">
                                    <form method="post" action="detalhes.php?id=<?php echo $pedido['id']; ?>" class="d-flex w-100 gap-3">

                                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">

                                        <div class="col-6 p-0">
                                            <button type="submit" name="art_status_action" value="aprovar"
                                                    class="btn btn-aprovar w-100">
                                                <i class="bi bi-check-lg me-2"></i>Aprovar Arte
                                            </button>
                                        </div>

                                        <div class="col-6 p-0">
                                            <button type="submit" name="art_status_action" value="reprovar"
                                                    class="btn btn-outline-secondary btn-rejeitar w-100">
                                                <i class="bi bi-x-lg me-2"></i>Solicitar Alteração
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>