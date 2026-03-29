<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>Estoque - KaoArt Admin</title>
</head>

<body class="bg-light">

<div class="wrapper">
    <?php include('../../includes/sidebar.php'); ?>
    
    <div class="main-content">
        <!-- HEADER com SEARCH -->
        <header class="top-header p-3 px-4 d-flex justify-content-between align-items-center shadow-sm">
            <div class="search-wrapper flex-grow-1">
                <i class="bi bi-search"></i>
                <input type="text" class="search-bar" placeholder="Buscar estoque de produtos...">
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
        <div class="scrollable-content">
            <!-- TITULO E BOTAO -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Gestão de Estoque</h2>
                    <p class="text-muted mb-0">Gerencie os produtos base para personalização</p>
                </div>
                <button class="btn" style="background-color: #5E219C; color: white; border: none; height: fit-content;" data-bs-toggle="modal" data-bs-target="#novoEstoque">
                    <i class="bi bi-plus-lg me-2"></i> Registrar Nova Entrada
                </button>
            </div>


            <!-- TABELA -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>ITEM</th>
                                <th>CATEGORIA</th>
                                <th>QUANTIDADE</th>
                                <th>STATUS</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ITEM 1 -->
                            <tr>
                                <td>
                                    <button class="btn btn-sm btn-outline" style="background-color: #5f219c; color: white; border: none;" data-bs-toggle="collapse" data-bs-target="#tamanhos-camisa">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://imageswscdn.wslojas.com.br/files/27020/camiseta-algodao-unisex-personalizacao-silk-screen-307224.jpg" width="40" class="rounded">
                                        <div>
                                            <strong>Camisa Branca</strong><br>
                                            <small class="text-muted">Personalização</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Têxtil</td>
                                <td>87</td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary border-0 rounded-pill px-3 py-2">Aguardando encomenda</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm" style="color: #0d6efd; background: none; border: none;" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm" style="color: #dc3545; background: none; border: none;" title="Deletar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- TAMANHOS CAMISA -->
                            <tr class="collapse" id="tamanhos-camisa">
                                <td colspan="6">
                                    <div class="p-3 bg-light rounded">
                                        <h6 class="mb-3 text-center" style="color: #6A31AA;">Tamanhos Disponíveis</h6>
                                        <div class="row justify-content-center">
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">PP</strong>
                                                    <p class="text-success mb-2">15 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">P</strong>
                                                    <p class="text-success mb-2">18 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">M</strong>
                                                    <p class="text-success mb-2">25 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">G</strong>
                                                    <p class="text-success mb-2">20 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">GG</strong>
                                                    <p class="text-danger mb-2">9 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- ITEM 2 -->
                            <tr>
                                <td></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1650959858546-d09833d5317b" width="40" class="rounded">
                                        <div>
                                            <strong>Caneca Branca</strong><br>
                                            <small class="text-muted">Personalização</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Cerâmica</td>
                                <td>150</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success border-0 rounded-pill px-3 py-2">Em estoque</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm" style="color: #0d6efd; background: none; border: none;" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm" style="color: #dc3545; background: none; border: none;" title="Deletar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- ITEM 3 -->
                            <tr>
                                <td></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://files.expanssiva.com.br/products/256x256/cartao-de-visita-supremo.jpg" width="40" class="rounded">
                                        <div>
                                            <strong>Cartão de Visita</strong><br>
                                            <small class="text-muted">Personalização</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Papel</td>
                                <td>25</td>
                                <td>
                                    <span class="badge bg-warning bg-opacity-10 text-warning border-0 rounded-pill px-3 py-2">Acabando</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm" style="color: #0d6efd; background: none; border: none;" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm" style="color: #dc3545; background: none; border: none;" title="Deletar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- ITEM 4 -->
                            <tr>
                                <td>
                                    <button class="btn btn-sm btn-outline" style="background-color: #5f219c; color: white; border: none;" data-bs-toggle="collapse" data-bs-target="#tamanhos-mascara">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdPU5xo02kKJtMlFlV9ej5x1bGgkSDrz8Iw&s" width="40" class="rounded">
                                        <div>
                                            <strong>Máscaras</strong><br>
                                            <small class="text-muted">Personalização</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Têxtil</td>
                                <td>5</td>
                                <td>
                                    <span class="badge bg-danger bg-opacity-10 text-danger border-0 rounded-pill px-3 py-2">Quase acabando</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm" style="color: #0d6efd; background: none; border: none;" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm" style="color: #dc3545; background: none; border: none;" title="Deletar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- TAMANHOS MASCARA -->
                            <tr class="collapse" id="tamanhos-mascara">
                                <td colspan="6">
                                    <div class="p-3 bg-light rounded">
                                        <h6 class="mb-3 text-center" style="color: #6A31AA;">Tamanhos Disponíveis</h6>
                                        <div class="row justify-content-center">
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">P</strong>
                                                    <p class="text-danger mb-2">2 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">M</strong>
                                                    <p class="text-danger mb-2">2 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card p-2 text-center">
                                                    <strong class="mb-2">G</strong>
                                                    <p class="text-danger mb-2">1 un</p>
                                                    <div class="btn-group w-100" role="group">
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">+</button>
                                                        <button type="button" class="btn btn-sm" style="background-color: #5E219C; color: white;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="novoEstoque">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nova Entrada</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Produto</label>
                            <select class="form-select mb-3">
                                <option>T-shirt Branca</option>
                                <option>Caneca</option>
                            </select>
                            <label class="form-label">Quantidade</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn" style="background-color: #b892ff; color: white; font-weight: bold; border: none;">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>