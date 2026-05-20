<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$userId = intval($_SESSION['user_id']);
$sql = "SELECT * FROM usuarios WHERE id = $userId";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    header("Location: login.php");
    exit;
}

$user = mysqli_fetch_assoc($result);
$baseURL = '../public';
include '../includes/header.php';
?>

<main class="container my-5 pt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex align-items-center mb-4 mt-2">
                <i class="bi bi-gear fs-3 me-2" style="color: #6f2da8;"></i>
                <h2 class="mb-0 fw-bold" style="color: #6f2da8;">Minhas Configurações</h2>
            </div>

            <?php if (isset($_GET['sucesso'])): ?>
                <div class="alert alert-success" role="alert">
                    Seus dados foram atualizados com sucesso.
                </div>
            <?php elseif (isset($_GET['erro'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    $erro = $_GET['erro'];
                    if ($erro === 'dados_incompletos') {
                        echo 'Preencha os campos obrigatórios antes de salvar.';
                    } elseif ($erro === 'email_invalido') {
                        echo 'Digite um e-mail válido.';
                    } elseif ($erro === 'email_existe') {
                        echo 'Este e-mail já está cadastrado por outro usuário.';
                    } elseif ($erro === 'senha_curta') {
                        echo 'A senha deve ter no mínimo 6 caracteres.';
                    } else {
                        echo 'Ocorreu um erro ao atualizar seus dados. Tente novamente.';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <form action="../backend/auth/atualizarPerfil.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $userId; ?>">
                <!-- Carde de Dados Cadastrais -->
                <div class="card shadow-sm border-0 mb-4 rounded-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h5 class="fw-bold m-0"><i class="bi bi-person me-2 text-secondary"></i>Dados Cadastrais</h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nome" class="form-label fw-medium text-muted small">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="<?php echo htmlspecialchars($user['nome_completo']); ?>"
                                    placeholder="Seu nome">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-medium text-muted small">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="seu@email.com">
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label fw-medium text-muted small">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone"
                                    value="<?php echo htmlspecialchars($user['telefone']); ?>"
                                    placeholder="(00) 00000-0000">
                            </div>
                            <div class="col-md-6">
                                <label for="nomeEmpresa" class="form-label fw-medium text-muted small">Nome da Empresa
                                    (opcional)</label>
                                <input type="text" class="form-control" id="nomeEmpresa" name="empresa"
                                    value="<?php echo htmlspecialchars($user['empresa']); ?>"
                                    placeholder="Nome da Empresa">
                            </div>
                            <div class="col-md-6">
                                <label for="endereco" class="form-label fw-medium text-muted small">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco"
                                    value="<?php echo htmlspecialchars($user['endereco']); ?>"
                                    placeholder="Endereço Rua, Número, Bairro">
                            </div>
                            <div class="col-md-6">
                                <label for="cep" class="form-label fw-medium text-muted small">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep"
                                    value="<?php echo htmlspecialchars($user['cep']); ?>" placeholder="00000-000">
                            </div>
                            <div class="col-md-6">
                                <label for="senha" class="form-label fw-medium text-muted small">Nova Senha
                                    (opcional)</label>
                                <input type="password" class="form-control" id="senha" name="senha"
                                    placeholder="******">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carde de Cartão de Crédito -->
                <div class="card shadow-sm border-0 mb-4 rounded-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h5 class="fw-bold m-0"><i class="bi bi-credit-card me-2 text-secondary"></i>Cartão de Crédito
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="nomeCartao" class="form-label fw-medium text-muted small">Nome Impresso no
                                    Cartão</label>
                                <input type="text" class="form-control text-uppercase" id="nomeCartao"
                                    placeholder="Ex: MARIA S SILVA">
                            </div>
                            <div class="col-12">
                                <label for="numCartao" class="form-label fw-medium text-muted small">Número do
                                    Cartão</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i
                                            class="bi bi-credit-card-2-front text-secondary"></i></span>
                                    <input type="text" class="form-control border-start-0" id="numCartao"
                                        placeholder="0000 0000 0000 0000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validade" class="form-label fw-medium text-muted small">Validade</label>
                                <input type="text" class="form-control" id="validade" placeholder="MM/AA">
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label fw-medium text-muted small">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="123" maxlength="4">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="produtos.php" class="btn btn-outline-secondary px-4 fw-medium">Cancelar</a>
                    <button type="submit" class="btn text-white px-5 fw-medium"
                        style="background-color: #6f2da8; border-color: #6f2da8;">Salvar
                        Alterações</button>
                </div>
            </form>

        </div>
    </div>
</main>

<footer class=" text-light text-center py-3">
    <p class="footer-text">&copy; KaoArt 2026. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>