<?php
require '../../backend/auth/validAdmin.php';
require '../../config/database.php';

// Contar artes por status
$sqlPendentes = "SELECT COUNT(*) AS total FROM itens_pedidos WHERE arte_personalizada IS NOT NULL AND (arte_status IS NULL OR arte_status = 'Pendente')";
$resultPendentes = mysqli_query($conn, $sqlPendentes);
$artesPendentes = $resultPendentes ? (int) mysqli_fetch_assoc($resultPendentes)['total'] : 0;

$sqlAprovadas = "SELECT COUNT(*) AS total FROM itens_pedidos WHERE arte_personalizada IS NOT NULL AND arte_status = 'Aprovada'";
$resultAprovadas = mysqli_query($conn, $sqlAprovadas);
$artesAprovadas = $resultAprovadas ? (int) mysqli_fetch_assoc($resultAprovadas)['total'] : 0;

$sqlEmRevisao = "SELECT COUNT(*) AS total FROM itens_pedidos WHERE arte_personalizada IS NOT NULL AND arte_status = 'Em Revisão'";
$resultEmRevisao = mysqli_query($conn, $sqlEmRevisao);
$artesEmRevisao = $resultEmRevisao ? (int) mysqli_fetch_assoc($resultEmRevisao)['total'] : 0;

$sqlRejeitadas = "SELECT COUNT(*) AS total FROM itens_pedidos WHERE arte_personalizada IS NOT NULL AND arte_status = 'Reprovada'";
$resultRejeitadas = mysqli_query($conn, $sqlRejeitadas);
$artesRejeitadas = $resultRejeitadas ? (int) mysqli_fetch_assoc($resultRejeitadas)['total'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovação de Artes - Admin KaoArt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="wrapper">

        <?php include("../../includes/sidebar.php"); ?>

        <div class="main-content">

            <header class="top-header p-3 px-4 d-flex justify-content-between align-items-center shadow-sm bg-white">
                <div class="search-wrapper flex-grow-1 position-relative">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" class="form-control bg-light border-0 ps-5"
                        placeholder="Buscar artes, pedidos..." style="max-width: 400px;">
                </div>

                <div class="d-flex align-items-center gap-4 ms-3 border-start ps-4">
                    <button class="btn btn-light position-relative border-0 rounded-circle p-2">
                        <i class="bi bi-bell fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">Novos alertas</span>
                        </span>
                    </button>
                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold"
                        style="width: 40px; height: 40px; background-color: #5e219c;">AD</div>
                </div>
            </header>

            <main class="scrollable-content p-4">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <h1 class="h3 text-dark mb-1">Aprovação de Artes</h1>
                        <p class="text-muted mb-0">Gerencie as artes enviadas pelos clientes</p>
                    </div>
                </div>

                <!-- CARDES -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted small mb-2">Pendentes</p>
                                    <p class="fs-2 fw-bold text-warning mb-0"><?php echo $artesPendentes; ?></p>
                                </div>
                                <div
                                    class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-hourglass-split fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted small mb-2">Aprovadas</p>
                                    <p class="fs-2 fw-bold text-success mb-0"><?php echo $artesAprovadas; ?></p>
                                </div>
                                <div
                                    class="bg-success bg-opacity-10 text-success rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check-circle fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted small mb-2">Em Revisão</p>
                                    <p class="fs-2 fw-bold text-info mb-0"><?php echo $artesEmRevisao; ?></p>
                                </div>
                                <div
                                    class="bg-info bg-opacity-10 text-info rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-search fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted small mb-2">Rejeitadas</p>
                                    <p class="fs-2 fw-bold text-danger mb-0"><?php echo $artesRejeitadas; ?></p>
                                </div>
                                <div
                                    class="bg-danger bg-opacity-10 text-danger rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-circle fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- GRID ARTES -->
                <div class="row g-4">
                    <?php
                    $sql = "SELECT ip.*, pr.nome AS produto_nome, ped.user_id, u.nome_completo
                            FROM itens_pedidos ip
                            JOIN produtos pr ON ip.produto_id = pr.id
                            JOIN pedidos ped ON ip.pedido_id = ped.id
                            JOIN usuarios u ON ped.user_id = u.id
                            WHERE ip.arte_personalizada IS NOT NULL AND (ip.arte_status IS NULL OR ip.arte_status <> 'Reprovada')
                            ORDER BY ip.id DESC";

                    $result = mysqli_query($conn, $sql);

                    if (!$result || mysqli_num_rows($result) === 0) {
                        echo '<div class="col-12"><p class="text-muted">Nenhuma arte enviada ainda.</p></div>';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $status = $row['arte_status'] ?: 'Pendente';
                            $badgeClass = $status === 'Aprovada' ? 'bg-success text-white' : ($status === 'Reprovada' ? 'bg-danger text-white' : 'bg-warning text-dark');
                            $imgPath = '../uploads/artes/' . htmlspecialchars($row['arte_personalizada'], ENT_QUOTES, 'UTF-8');
                            ?>
                            <div class="col-md-4">
                                <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden">
                                    <div class="position-relative ratio ratio-16x9">
                                        <img src="<?php echo $imgPath; ?>" class="object-fit-cover w-100 h-100"
                                            alt="Arte enviada">
                                        <div class="position-absolute top-0 end-0 p-3">
                                            <span
                                                class="badge <?php echo $badgeClass; ?> shadow-sm px-3 py-2 rounded-pill"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></span>
                                        </div>
                                    </div>

                                    <div class="card-body p-4 d-flex flex-column">
                                        <small class="text-muted fw-semibold mb-1">Pedido
                                            #<?php echo intval($row['pedido_id']); ?></small>
                                        <h5 class="card-title fw-bold mb-1">
                                            <?php echo htmlspecialchars($row['nome_completo'], ENT_QUOTES, 'UTF-8'); ?>
                                        </h5>
                                        <p class="text-muted small mb-3">
                                            <?php echo htmlspecialchars($row['produto_nome'], ENT_QUOTES, 'UTF-8'); ?>
                                        </p>

                                        <div class="bg-light p-3 rounded-3 mb-4 flex-grow-1">
                                            <p class="small mb-0 text-secondary">
                                                <i
                                                    class="bi bi-chat-left-text me-2"></i><?php echo nl2br(htmlspecialchars($row['observacoes'] ?: 'Sem observações', ENT_QUOTES, 'UTF-8')); ?>
                                            </p>
                                        </div>

                                        <div class="d-flex gap-2 mt-auto">
                                            <button class="btn btn-light flex-grow-1 border" data-bs-toggle="modal"
                                                data-bs-target="#modalArte<?php echo $row['id']; ?>">
                                                <i class="bi bi-eye"></i> Ver
                                            </button>

                                            <form method="post"
                                                action="detalhes.php?id=<?php echo intval($row['pedido_id']); ?>"
                                                class="d-flex gap-2 flex-grow-1">
                                                <input type="hidden" name="item_id" value="<?php echo intval($row['id']); ?>">
                                                <button type="submit" name="art_status_action" value="aprovar"
                                                    class="btn btn-success flex-grow-1">
                                                    <i class="bi bi-check-lg"></i> Aprovar
                                                </button>
                                                <button type="submit" name="art_status_action" value="reprovar"
                                                    class="btn btn-outline-danger flex-grow-1">
                                                    <i class="bi bi-x-lg"></i> Rejeitar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de visualização individual -->
                            <div class="modal fade" id="modalArte<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                                            <h5 class="modal-title fw-bold">Detalhes da Arte</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row g-4">
                                                <div class="col-lg-7">
                                                    <img src="<?php echo $imgPath; ?>"
                                                        class="img-fluid rounded-4 shadow-sm w-100" alt="Imagem ampliada">
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="bg-light rounded-4 p-4 h-100 d-flex flex-column">
                                                        <h6 class="fw-bold mb-3 text-uppercase text-muted small">Informações
                                                        </h6>
                                                        <p class="mb-2"><strong class="text-dark">Cliente:</strong> <span
                                                                class="text-secondary"><?php echo htmlspecialchars($row['nome_completo'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                        </p>
                                                        <p class="mb-2"><strong class="text-dark">Produto:</strong> <span
                                                                class="text-secondary"><?php echo htmlspecialchars($row['produto_nome'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                        </p>
                                                        <p class="mb-4"><strong class="text-dark">Pedido:</strong> <span
                                                                class="text-secondary">#<?php echo intval($row['pedido_id']); ?></span>
                                                        </p>

                                                        <h6 class="fw-bold mb-3 text-uppercase text-muted small">Instruções</h6>
                                                        <div class="bg-white p-3 rounded-3 border mb-4 shadow-sm">
                                                            <p class="small text-muted mb-0">
                                                                <?php echo nl2br(htmlspecialchars($row['observacoes'] ?: 'Sem instruções', ENT_QUOTES, 'UTF-8')); ?>
                                                            </p>
                                                        </div>

                                                        <div class="mt-auto d-grid gap-2">
                                                            <form method="post"
                                                                action="detalhes.php?id=<?php echo intval($row['pedido_id']); ?>">
                                                                <input type="hidden" name="item_id"
                                                                    value="<?php echo intval($row['id']); ?>">
                                                                <button class="btn btn-success fw-medium"
                                                                    name="art_status_action" value="aprovar">
                                                                    <i class="bi bi-check-circle me-2"></i>Aprovar Arte
                                                                </button>
                                                                <button class="btn btn-outline-danger fw-medium mt-2"
                                                                    name="art_status_action" value="reprovar">
                                                                    <i class="bi bi-x-circle me-2"></i>Rejeitar Arte
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>

            </main>
        </div>
    </div>

    <!-- MODAL VISUALIZAR -->
    <div class="modal fade" id="modalArte" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold">Detalhes da Arte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c"
                                class="img-fluid rounded-4 shadow-sm w-100" alt="Imagem ampliada">
                        </div>
                        <div class="col-lg-5">
                            <div class="bg-light rounded-4 p-4 h-100 d-flex flex-column">
                                <h6 class="fw-bold mb-3 text-uppercase text-muted small">Informações</h6>
                                <p class="mb-2"><strong class="text-dark">Cliente:</strong> <span
                                        class="text-secondary">Maria Silva</span></p>
                                <p class="mb-2"><strong class="text-dark">Produto:</strong> <span
                                        class="text-secondary">Camiseta Branca - M</span></p>
                                <p class="mb-4"><strong class="text-dark">Envio:</strong> <span
                                        class="text-secondary">28/03/2024</span></p>

                                <h6 class="fw-bold mb-3 text-uppercase text-muted small">Instruções</h6>
                                <div class="bg-white p-3 rounded-3 border mb-4 shadow-sm">
                                    <p class="small text-muted mb-0"><i
                                            class="bi bi-chat-quote text-primary me-2"></i>Gostaria da logo centralizada
                                        na frente da camiseta. Tamanho aproximado: 15cm.</p>
                                </div>

                                <div class="mt-auto d-grid gap-2">
                                    <button class="btn btn-success fw-medium">
                                        <i class="bi bi-check-circle me-2"></i>Aprovar Arte
                                    </button>
                                    <button class="btn btn-outline-danger fw-medium" data-bs-toggle="modal"
                                        data-bs-target="#modalComentario" data-bs-dismiss="modal">
                                        <i class="bi bi-x-circle me-2"></i>Rejeitar Arte
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL COMENTARIO -->
    <div class="modal fade" id="modalComentario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold">Justificar Decisão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-muted small mb-3">Adicione um comentário para o cliente sobre a aprovação ou rejeição
                        da arte.</p>
                    <div class="form-floating text-dark mb-2">
                        <textarea class="form-control bg-light border-0" placeholder="Deixe um comentário"
                            id="floatingTextarea" style="height: 120px"></textarea>
                        <label for="floatingTextarea">Comentário / Motivo</label>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary px-4 fw-medium text-white"
                        style="background-color: #5e219c; border: none;">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>