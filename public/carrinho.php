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
<script>
// Atualiza o número no ícone do carrinho
(function() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const total = carrinho.reduce((acc, p) => acc + p.quantidade, 0);
    const badge = document.querySelector('.badge.rounded-pill');
    if (badge && total > 0) badge.textContent = total;
})();
</script>

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
        <div class="col-lg-8" id="lista-carrinho">
            <!-- preenchido pelo JS -->
        </div>

        <!-- Resumo -->
        <div class="col-lg-4">
            <div class="card shadow-sm p-3">
                <h5 class="text-center mb-3 tituloPortfolio">Resumo do Pedido</h5>
                <div class="d-flex justify-content-between">
                    <span>Subtotal:</span>
                    <strong id="subtotal">R$ 0,00</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Frete:</span>
                    <strong id="frete">R$ 15,00</strong>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>Total:</span>
                    <strong class="destaquetexto" id="total">R$ 0,00</strong>
                </div>
                <button class="btn btn-primary w-100 mt-3" onclick="finalizarCompra()">
                    Finalizar Compra
                </button>
                <button class="btn btn-outline-secondary w-100 mt-2" onclick="limparCarrinho()">
                    🗑 Esvaziar carrinho
                </button>
            </div>
        </div>
    </div>
</main>

<script>
// Lê o carrinho do localStorage
function carregarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const lista = document.getElementById('lista-carrinho');

    // Carrinho vazio
    if (carrinho.length === 0) {
        lista.innerHTML = `
            <div class="text-center py-5 text-muted">
                <i class="bi bi-cart-x fs-1"></i>
                <p class="mt-3">Seu carrinho está vazio.</p>
                <a href="produtos.php" class="btn btn-primary">Ver Produtos</a>
            </div>`;
        document.getElementById('subtotal').textContent = 'R$ 0,00';
        document.getElementById('total').textContent = 'R$ 0,00';
        document.getElementById('frete').textContent = 'R$ 0,00';
        return;
    }

    // Renderiza cada item
    lista.innerHTML = carrinho.map((item, index) => `
        <div class="card mb-3 shadow-sm">
            <div class="row g-0 align-items-center p-3">
                <div class="col-3 text-center">
                    <img src="${item.img}" alt="${item.nome}"
                         style="max-height:80px; object-fit:cover; border-radius:8px;">
                </div>
                <div class="col-5">
                    <h6 class="mb-1 fw-bold">${item.nome}</h6>
                    <p class="text-roxo fw-bold mb-0">
                        R$ ${item.preco.toFixed(2).replace('.', ',')}
                    </p>
                </div>
                <div class="col-2 text-center">
                    <!-- Botões de quantidade -->
                    <div class="d-flex align-items-center justify-content-center gap-1">
                        <button class="btn btn-sm btn-outline-secondary"
                                onclick="mudarQtd(${index}, -1)">−</button>
                        <span class="fw-bold">${item.quantidade}</span>
                        <button class="btn btn-sm btn-outline-secondary"
                                onclick="mudarQtd(${index}, +1)">+</button>
                    </div>
                </div>
                <div class="col-2 text-end">
                    <p class="fw-bold mb-1">
                        R$ ${(item.preco * item.quantidade).toFixed(2).replace('.', ',')}
                    </p>
                    <button class="btn btn-sm btn-outline-danger"
                            onclick="removerItem(${index})">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `).join('');

    // Calcula total
    const subtotal = carrinho.reduce((acc, p) => acc + p.preco * p.quantidade, 0);
    const frete    = subtotal >= 150 ? 0 : 15;
    const total    = subtotal + frete;

    document.getElementById('subtotal').textContent =
        'R$ ' + subtotal.toFixed(2).replace('.', ',');
    document.getElementById('frete').textContent =
        frete === 0 ? '✅ GRÁTIS' : 'R$ ' + frete.toFixed(2).replace('.', ',');
    document.getElementById('total').textContent =
        'R$ ' + total.toFixed(2).replace('.', ',');
}

// Muda quantidade 
function mudarQtd(index, delta) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho[index].quantidade += delta;

    // Se chegou a 0, remove o item
    if (carrinho[index].quantidade <= 0) {
        carrinho.splice(index, 1);
    }

    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    carregarCarrinho(); 
}

// Remove um item pelo índice
function removerItem(index) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho.splice(index, 1);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    carregarCarrinho();
}

// Esvazia o carrinho
function limparCarrinho() {
    localStorage.removeItem('carrinho');
    carregarCarrinho();
}

// Finalizar compra (redireciona ou integra com PHP depois)
function finalizarCompra() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    if (carrinho.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }
    // Por enquanto mostra alerta — depois você integra com PHP/banco
    alert('Pedido realizado com sucesso! 🎉');
    localStorage.removeItem('carrinho');
    window.location.href = 'index.php';
}

// Roda ao carregar a página
carregarCarrinho();
</script>

    <!-- Rodapé -->
    <footer class="footer">
        <p>&copy; KaoArt 2025. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>