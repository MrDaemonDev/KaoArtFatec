<?php

require '../../backend/auth/validAdmin.php';

$baseURL = '.';

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
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
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
                                <h3 class="mb-0 text-dark fw-bold">12</h3>
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
                                <h3 class="mb-0 text-dark fw-bold">R$ 24.580</h3>
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
                                <h3 class="mb-0 text-dark fw-bold">5</h3>
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
                            <tr style="cursor: pointer; transition: background-color 0.2s;">
                                <td class="px-4 fw-medium text-dark">#1234</td>
                                <td class="text-dark fw-medium">Maria Silva</td>
                                <td class="text-muted">21/03/2026</td>
                                <td class="text-dark fw-semibold">R$ 189,90</td>
                                <td>
                                    <span class="badge bg-warning bg-opacity-10 text-warning border-0 rounded-pill px-3 py-2">
                                        Pendente
                                    </span>
                                </td>
                            </tr>
                            <tr style="cursor: pointer; transition: background-color 0.2s;">
                                <td class="px-4 fw-medium text-dark">#1235</td>
                                <td class="text-dark fw-medium">João Santos</td>
                                <td class="text-muted">21/03/2026</td>
                                <td class="text-dark fw-semibold">R$ 345,50</td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary border-0 rounded-pill px-3 py-2">
                                        Em Produção
                                    </span>
                                </td>
                            </tr>
                            <tr style="cursor: pointer; transition: background-color 0.2s;">
                                <td class="px-4 fw-medium text-dark">#1236</td>
                                <td class="text-dark fw-medium">Ana Costa</td>
                                <td class="text-muted">20/03/2026</td>
                                <td class="text-dark fw-semibold">R$ 129,00</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success border-0 rounded-pill px-3 py-2">
                                        Enviado
                                    </span>
                                </td>
                            </tr>
                            <tr style="cursor: pointer; transition: background-color 0.2s;">
                                <td class="px-4 fw-medium text-dark">#1237</td>
                                <td class="text-dark fw-medium">Pedro Oliveira</td>
                                <td class="text-muted">20/03/2026</td>
                                <td class="text-dark fw-semibold">R$ 420,00</td>
                                <td>
                                    <span class="badge bg-warning bg-opacity-10 text-warning border-0 rounded-pill px-3 py-2">
                                        Pendente
                                    </span>
                                </td>
                            </tr>
                            <tr style="cursor: pointer; transition: background-color 0.2s;">
                                <td class="px-4 fw-medium text-dark">#1238</td>
                                <td class="text-dark fw-medium">Carla Mendes</td>
                                <td class="text-muted">19/03/2026</td>
                                <td class="text-dark fw-semibold">R$ 278,90</td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary border-0 rounded-pill px-3 py-2">
                                        Em Produção
                                    </span>
                                </td>
                            </tr>
                            <tr style="cursor: pointer; transition: background-color 0.2s;">
                                <td class="px-4 fw-medium text-dark">#1239</td>
                                <td class="text-dark fw-medium">Lucas Fernandes</td>
                                <td class="text-muted">19/03/2026</td>
                                <td class="text-dark fw-semibold">R$ 156,00</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success border-0 rounded-pill px-3 py-2">
                                        Enviado
                                    </span>
                                </td>
                            </tr>
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