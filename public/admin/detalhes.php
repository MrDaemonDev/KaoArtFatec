<?php

require '../../backend/auth/validAdmin.php';

$baseURL = '.';

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
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">Novos alertas</span>
                    </span>
                </button>
                <div class="avatar-circle" style="background-color: #5e219c;">AD</div>
            </div>
        </header>

        <main class="scrollable-content">
            
      
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 text-dark mb-1">Detalhes do Pedido #1234</h1>
                    <p class="text-muted">Realizado em 21/03/2026</p>
                </div>
                <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2" style="font-size: 14px;">
                    Pendente
                </span>
            </div>

            <div class="row g-4">
            
                <div class="col-lg-8">
                    
                  
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-dark fw-bold mb-4">Informações do Cliente</h5>
                            
                            <div class="info-item">
                                <i class="bi bi-person"></i>
                                <span class="text-dark">Maria Silva</span>
                            </div>
                            
                            <div class="info-item">
                                <i class="bi bi-envelope"></i>
                                <span class="text-muted">maria.silva@email.com</span>
                            </div>
                            
                            <div class="info-item">
                                <i class="bi bi-telephone"></i>
                                <span class="text-muted">(11) 98765-4321</span>
                            </div>
                            
                            <div class="info-item">
                                <i class="bi bi-geo-alt"></i>
                                <span class="text-muted">Rua das Flores, 123 - São Paulo, SP</span>
                            </div>
                        </div>
                    </div>

                    <!-- Itens do Pedido -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-dark fw-bold mb-4">Itens do Pedido</h5>
                            
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="mb-1 text-dark" style="font-size: 14px;">Camiseta Personalizada Básica</p>
                                        <p class="mb-0 text-muted" style="font-size: 12px;">Qtd: 2 × R$ 59,90</p>
                                    </div>
                                    <p class="text-dark" style="font-size: 14px;">R$ 119,80</p>
                                </div>
                            </div>
                            
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="mb-1 text-dark" style="font-size: 14px;">Caneca Mágica Personalizada</p>
                                        <p class="mb-0 text-muted" style="font-size: 12px;">Qtd: 1 × R$ 39,90</p>
                                    </div>
                                    <p class="text-dark" style="font-size: 14px;">R$ 39,90</p>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center pt-3">
                                <p class="text-dark fw-semibold mb-0">Total</p>
                                <p class="text-dark fw-bold mb-0" style="font-size: 18px;">R$ 159,70</p>
                            </div>
                        </div>
                    </div>

                    <!-- Status do Pedido -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-dark fw-bold mb-4">Status do Pedido</h5>
                            
                            <select class="form-select" aria-label="Mudar status do pedido">
                                <option value="pendente" selected>Pendente</option>
                                <option value="pagamento">Pagamento Confirmado</option>
                                <option value="arte">Arte Aprovada</option>
                                <option value="producao">Em Produção</option>
                                <option value="enviado">Enviado</option>
                            </select>
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
                                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=600&h=600&fit=crop" alt="Arte do cliente" class="w-100 h-100" style="object-fit: cover;">
                                </div>
                            </div>

                            <!-- Observações -->
                            <div class="p-3 bg-light rounded-3 mb-4">
                                <p class="mb-2" style="font-size: 12px; color: #6c757d;">Observações do Cliente:</p>
                                <p class="mb-0" style="font-size: 14px; color: #212529;">Cliente solicitou arte com fundo transparente e cores vibrantes.</p>
                            </div>

                            <!-- Approval Buttons -->
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <button class="btn btn-aprovar w-100">
                                        <i class="bi bi-check-lg me-2"></i>Aprovar Arte
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-secondary btn-rejeitar w-100">
                                        <i class="bi bi-x-lg me-2"></i>Solicitar Alteração
                                    </button>
                                </div>
                            </div>

                            <!-- Download/View Options -->
                            <button class="btn btn-outline-secondary w-100">
                                <i class="bi bi-download me-2"></i>Baixar Arte Original
                            </button>
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
