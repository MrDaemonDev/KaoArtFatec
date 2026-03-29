<?php
require '../../backend/auth/validAdmin.php';
require '../../config/database.php';

$clientes = [
    ['id' => 1, 'nome' => 'Ana Silva', 'email' => 'ana.silva@kaoart.com', 'telefone' => '(11) 91234-5678', 'tipo' => 'Administrador', 'status' => 'Ativo', 'dataCadastro' => '15/01/2024'],
    ['id' => 2, 'nome' => 'Carlos Santos', 'email' => 'carlos.santos@kaoart.com', 'telefone' => '(11) 92345-6789', 'tipo' => 'Operador', 'status' => 'Ativo', 'dataCadastro' => '20/01/2024'],
    ['id' => 3, 'nome' => 'Maria Oliveira', 'email' => 'maria.oliveira@kaoart.com', 'telefone' => '(11) 93456-7890', 'tipo' => 'Operador', 'status' => 'Inativo', 'dataCadastro' => '25/01/2024'],
    ['id' => 4, 'nome' => 'João Ferreira', 'email' => 'joao.ferreira@kaoart.com', 'telefone' => '(11) 94567-8901', 'tipo' => 'Visualizador', 'status' => 'Ativo', 'dataCadastro' => '10/02/2024'],
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Admin KaoArt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .btn-primario-kao { 
            background-color: #5e219c; 
            color: white; 
            border: none; 
        }
        .btn-primario-kao:hover { 
            background-color: #4a197c; 
            color: white; 
        }

        .badge-admin {
            background-color: #e5d4f8;
            color: #5e219c;
            border: none;
        }

        .badge-operador {
            background-color: #cfe2ff;
            color: #084298;
            border: none;
        }

        .badge-visualizador {
            background-color: #e2e3e5;
            color: #383d41;
            border: none;
        }

        .badge-ativo {
            background-color: #d4edda;
            color: #155724;
            border: none;
        }

        .badge-inativo {
            background-color: #f8d7da;
            color: #842029;
            border: none;
        }

        .avatar-initials {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #5e219c;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #e9ecef;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #5e219c;
        }

        .stat-value.ativo { color: #155724; }
        .stat-value.operador { color: #084298; }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-buttons button {
            padding: 0.5rem 0.75rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-edit {
            background-color: transparent;
            color: #0066cc;
        }

        .btn-edit:hover {
            background-color: #e7f1ff;
        }

        .btn-delete {
            background-color: transparent;
            color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #ffe7eb;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <?php include("../../includes/sidebar.php"); ?>

    <div class="main-content">

        <header class="top-header p-3 px-4 d-flex justify-content-between align-items-center shadow-sm">
           
            <!-- POR FAVOR, NÃO MEXA NESSA DIV ABAIXO, SE NÃO QUEBRA O LAYOUT DA HEADER-->
            <div></div>

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

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h1 class="h3 text-dark mb-1">Gestão de Usuários</h1>
                    <p class="text-muted mb-0">Gerencie os usuários do sistema</p>
                </div>

                
            </div>

            <!-- STATS CARDS -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">Total de Usuários</p>
                                <p class="stat-value"><?php echo count($clientes); ?></p>
                            </div>
                            <div class="icon-box bg-primary bg-opacity-10">
                                <i class="bi bi-people-fill text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">Usuários Ativos</p>
                                <p class="stat-value ativo"><?php echo count(array_filter($clientes, fn($c) => $c['status'] === 'Ativo')); ?></p>
                            </div>
                            <div class="icon-box bg-success bg-opacity-10">
                                <i class="bi bi-check-circle-fill text-success fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">Administradores</p>
                                <p class="stat-value admin-count"><?php echo count(array_filter($clientes, fn($c) => $c['tipo'] === 'Administrador')); ?></p>
                            </div>
                            <div class="icon-box bg-warning bg-opacity-10">
                                <i class="bi bi-shield-fill text-warning fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2">Operadores</p>
                                <p class="stat-value operador"><?php echo count(array_filter($clientes, fn($c) => $c['tipo'] === 'Operador')); ?></p>
                            </div>
                            <div class="icon-box bg-info bg-opacity-10">
                                <i class="bi bi-person-badge-fill text-info fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FILTROS -->
            <div class="card shadow-sm border-0 rounded-4 p-3 mb-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control border-0 bg-light" placeholder="Pesquisar por nome ou email" id="filterSearch">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select border-0 bg-light" id="filterTipo">
                            <option value="">Filtrar por Tipo</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Operador">Operador</option>
                            <option value="Visualizador">Visualizador</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select border-0 bg-light" id="filterStatus">
                            <option value="">Filtrar por Status</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- TABELA -->
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase text-muted small fw-semibold py-3 px-4">Usuário</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Contato</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Tipo</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Status</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3">Data Cadastro</th>
                                <th class="text-uppercase text-muted small fw-semibold py-3 text-end px-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0" id="tableClientes">
                            <?php foreach ($clientes as $cliente): ?>
                            <tr class="cliente-row" data-nome="<?php echo $cliente['nome']; ?>" data-email="<?php echo $cliente['email']; ?>" data-tipo="<?php echo $cliente['tipo']; ?>" data-status="<?php echo $cliente['status']; ?>">
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-initials">
                                            <?php echo substr($cliente['nome'], 0, 1) . substr(explode(' ', $cliente['nome'])[1] ?? '', 0, 1); ?>
                                        </div>
                                        <div>
                                            <p class="text-dark fw-medium mb-1"><?php echo $cliente['nome']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex align-items-center gap-2 text-muted small">
                                            <i class="bi bi-envelope" style="font-size: 0.9rem;"></i>
                                            <span><?php echo $cliente['email']; ?></span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 text-muted small">
                                            <i class="bi bi-telephone" style="font-size: 0.9rem;"></i>
                                            <span><?php echo $cliente['telefone']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <span class="badge px-3 py-2 
                                        <?php echo $cliente['tipo'] === 'Administrador' ? 'badge-admin' : 
                                                  ($cliente['tipo'] === 'Operador' ? 'badge-operador' : 'badge-visualizador'); ?>">
                                        <?php echo $cliente['tipo']; ?>
                                    </span>
                                </td>
                                <td class="py-3">
                                    <span class="badge px-3 py-2 <?php echo $cliente['status'] === 'Ativo' ? 'badge-ativo' : 'badge-inativo'; ?>">
                                        <?php echo $cliente['status']; ?>
                                    </span>
                                </td>
                                <td class="py-3 text-muted small"><?php echo $cliente['dataCadastro']; ?></td>
                                <td class="text-end px-4 py-3">
                                    <div class="action-buttons justify-content-end">
                                        <button class="btn-edit" title="Editar" data-bs-toggle="modal" data-bs-target="#modalNovoCliente">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn-delete" title="Excluir" onclick="if(confirm('Tem certeza que deseja excluir este cliente?')) { alert('Cliente excluído'); }">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- MODAL NOVO/EDITAR CLIENTE -->
<div class="modal fade" id="modalNovoCliente" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="modalLabel">Novo Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <form id="formNovoCliente" action="#" method="POST">
                <div class="modal-body p-4">
                    <div class="row g-4">

                        <div class="col-12">
                            <label class="form-label fw-medium text-dark">Nome Completo *</label>
                            <input type="text" class="form-control" name="nome" placeholder="Ex: Ana Silva" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Email *</label>
                            <input type="email" class="form-control" name="email" placeholder="email@kaoart.com" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Telefone *</label>
                            <input type="tel" class="form-control" name="telefone" placeholder="(11) 98765-4321" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Senha *</label>
                            <input type="password" class="form-control" name="senha" placeholder="••••••••" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Tipo de Usuário *</label>
                            <select class="form-select" name="tipo" required>
                                <option value="" selected disabled>Selecione um tipo</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Operador">Operador</option>
                                <option value="Visualizador">Visualizador</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark">Status *</label>
                            <select class="form-select" name="status" required>
                                <option value="" selected disabled>Selecione um status</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>

                        <!-- INFO PERMISSÕES -->
                        <div class="col-12">
                            <div class="alert alert-info" role="alert" style="background-color: #e7f3ff; border-color: #084298; color: #084298;">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Tipos de Acesso:</strong>
                                <ul class="mb-0 mt-2" style="font-size: 0.95rem;">
                                    <li><strong>Administrador:</strong> Acesso total ao sistema</li>
                                    <li><strong>Operador:</strong> Gerenciar pedidos, produtos e estoque</li>
                                    <li><strong>Visualizador:</strong> Apenas visualizar relatórios e dados</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-top-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primario-kao px-4">Salvar Cliente</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // FILTRO DE BUSCA
    const filterSearch = document.getElementById('filterSearch');
    const filterTipo = document.getElementById('filterTipo');
    const filterStatus = document.getElementById('filterStatus');
    const clienteRows = document.querySelectorAll('.cliente-row');

    function aplicarFiltros() {
        const searchTerm = filterSearch.value.toLowerCase();
        const tipoTerm = filterTipo.value.toLowerCase();
        const statusTerm = filterStatus.value.toLowerCase();

        clienteRows.forEach(row => {
            const nome = row.dataset.nome.toLowerCase();
            const email = row.dataset.email.toLowerCase();
            const tipo = row.dataset.tipo.toLowerCase();
            const status = row.dataset.status.toLowerCase();

            const matchSearch = nome.includes(searchTerm) || email.includes(searchTerm);
            const matchTipo = !tipoTerm || tipo === tipoTerm;
            const matchStatus = !statusTerm || status === statusTerm;

            row.style.display = (matchSearch && matchTipo && matchStatus) ? '' : 'none';
        });
    }

    filterSearch.addEventListener('keyup', aplicarFiltros);
    filterTipo.addEventListener('change', aplicarFiltros);
    filterStatus.addEventListener('change', aplicarFiltros);

    // SUBMIT FORMULÁRIO
    document.getElementById('formNovoCliente').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Cliente salvo com sucesso!');
        bootstrap.Modal.getInstance(document.getElementById('modalNovoCliente')).hide();
    });
</script>

</body>
</html>
