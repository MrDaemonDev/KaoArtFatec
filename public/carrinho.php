<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - KaoArt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
        <div class="container">
            <img src="img/etc/passaroKao.png" alt="logotipo KaoArt" id="passaro" />
            <a class="navbar-brand fw-bold" href="index.php">KaoArt</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="produtos.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="contatos.php">Contatos</a></li>
                    <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfólio</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <a href="login.php" class="btn btn-outline-light btn-sm me-2"><i
                            class="bi bi-person-circle"></i></a>
                    <a href="carrinho.php" class="btn btn-outline-light btn-sm position-relative">
                        <i class="bi bi-cart"></i>
                    </a>
                    <a href="https://www.instagram.com/kaao_art/" class="btn btn-outline-light btn-sm ms-2"
                        target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <main class="container my-5 pt-5">
        <h1 class="text-center mb-4 tituloPortfolio">🛒 Meu Carrinho</h1>

        <div class="row">
            <!-- Lista de produtos -->
            <div class="col-lg-8">
                <div class="card mb-3 shadow-sm">
                    <div class="row g-0 align-items-center p-3">
                        <div class="col-md-3 text-center">
                        </div>

                    </div>
                </div>


            </div>

            <!-- Resumo -->
            <div class="col-lg-4">
                <div class="card shadow-sm p-3">
                    <h5 class="text-center mb-3 tituloPortfolio">Resumo do Pedido</h5>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal:</span>
                        <strong class=""></strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Frete:</span>
                        <strong></strong>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Total:</span>
                        <strong class="destaquetexto"></strong>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <p>&copy; KaoArt 2025. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>