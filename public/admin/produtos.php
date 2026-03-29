<?php

require '../../backend/auth/validAdmin.php';
require '../../config/database.php';

$baseURL = '.';

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Admin KaoArt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>

        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        .upload-area:hover { border-color: #5e219c; background-color: rgba(94, 33, 156, 0.05); }

        .btn-primario-kao { background-color: #5e219c; color: white; border: none; }
        .btn-primario-kao:hover { background-color: #4a197c; color: white; }
    </style>
</head>
<body>

<div class="wrapper">

    <?php include("../../includes/sidebar.php"); ?>

    <div class="main-content">

        <header class="top-header p-3 px-4 d-flex justify-content-between align-items-center shadow-sm">
            <div class="search-wrapper flex-grow-1">
                <i class="bi bi-search"></i>
                <input type="text" class="search-bar" placeholder="Buscar produtos...">
            </div>

            <div class="d-flex align-items-center gap-4 ms-3 border-start ps-4">
                <button class="btn btn-light position-relative border-0 rounded-circle p-2">
                    <i class="bi bi-bell fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">Novos alertas</span>
                    </span>
                </button>
                <div class="avatar-circle" style="background-color: #5e219c;">AD</div>
            </div>
        </header>

        <main class="scrollable-content">

            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h1 class="h3 text-dark mb-1">Gestão de Produtos</h1>
                    <p class="text-muted mb-0">Gerencie o catálogo de produtos da loja</p>
                </div>

                <button class="btn btn-primario-kao px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalNovoProduto">
                    <i class="bi bi-plus-lg me-2"></i> Adicionar Novo Produto
                </button>
            </div>

            <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase text-muted small fw-semibold py-3 px-4">Produto</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Categoria</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Preço</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Estoque</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3 text-end px-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                        <?php while ($produto = mysqli_fetch_assoc($resultado)): ?>
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="../<?php echo $produto['imagem']; ?>" alt="Camiseta Personalizada Básica" class="rounded" style="width: 48px; height: 48px; object-fit: cover;">
                                        <span class="text-dark fw-medium"><?php echo $produto['nome']; ?></span>
                                    </div>
                                </td>
                                <td class="text-muted"><?php echo $produto['categoria']; ?></td>
                                <td class="text-dark fw-semibold">R$ <?php echo $produto['preco']; ?></td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success border-0 rounded px-2 py-1">
                                        <?php echo $produto['unidade']; ?>
                                    </span>
                                </td>
                                <td class="text-end px-4">
                                    <button class="btn btn-sm btn-light text-primary me-1" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light text-danger" title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </button>
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

<div class="modal fade" id="modalNovoProduto" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="modalLabel">Novo Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" id="formNovoProduto">
                <div class="modal-body p-4">
                    <div class="row g-4">

                        <div class="col-12">
                            <label class="form-label fw-medium text-dark">Nome do Produto</label>
                            <input type="text" class="form-control" name="nome" placeholder="Ex: Camiseta Personalizada Básica" requiredaria-label="Nome do Produto">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-medium text-dark">Imagem do Produto</label>
                            <div class="upload-area" role="button" aria-label="Área de upload de imagem">
                                <i class="bi bi-cloud-arrow-up fs-2 text-muted"></i>
                                <p class="mb-1 mt-2 text-dark fw-medium">Arraste e solte a imagem aqui ou clique para selecionar</p>
                                <p class="text-muted small mb-0">PNG, JPG até 5MB</p>
                                <input type="file" name="imagem" class="d-none" id="fileUpload" aria-label="Selecionar arquivo de imagem">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-medium text-dark">Descrição</label>
                            <textarea class="form-control" name="descricao" rows="3" placeholder="Descreva o produto..." aria-label="Descrição do Produto" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Categoria</label>
                            <select class="form-select" name="categoria" aria-label="Selecionar Categoria" required>
                                <option value="" selected disabled>Selecione uma categoria</option>
                                <option value="camisetas">Camisetas</option>
                                <option value="canecas">Canecas</option>
                                <option value="cartao">Cartão de Visitas</option>
                                <option value="mascaras">Máscaras</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Valor (R$)</label>
                            <input type="text" class="form-control" name="preco" placeholder="0,00" aria-label="Valor do Produto" required>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-top-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primario-kao px-4">Salvar Produto</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.querySelector('.upload-area').addEventListener('click', function() {
        document.getElementById('fileUpload').click();
    });
</script>

</body>
</html>