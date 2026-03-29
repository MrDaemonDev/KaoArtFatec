<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - KaoArt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>

    <div class="cadastro-wrapper">
        <!-- SIDEBAR / LADO ESQUERDO -->
        <div class="cadastro-sidebar d-none d-lg-flex">
            <div>
                <div class="logo-cadastro">
                    <img src="img/etc/passaroKao.png" alt="KaoArt Logo">
                    <h2>Kao Art</h2>
                </div>

                <h2></h2>
                <p>Crie sua conta e comece a personalizar produtos incríveis para seus clientes</p>
            </div>


        </div>

        <!-- CONTEÚDO / LADO DIREITO -->
        <div class="cadastro-content">
            <div class="cadastro-form-wrapper">

                <div class="logo-cadastro d-lg-none mb-4">
                    <img src="img/etc/passaroKao.png" alt="KaoArt Logo" style="width: 40px;">
                    <h3 style="font-size: 1.3rem;">Kao Art</h3>
                </div>

                <!-- CABEÇALHO DO FORMULÁRIO -->
                <div class="cadastro-form-header">
                    <h1>Criar Conta</h1>
                    <p>Preencha seus dados para começar</p>
                </div>

                <!-- MENSAGENS DE ERRO -->
                <?php
                $erros = [
                    'dados_incompletos' => 'Por favor, preencha todos os campos obrigatórios.',
                    'senhas_diferentes' => 'As senhas não correspondem. Tente novamente.',
                    'senha_curta' => 'A senha deve ter no mínimo 6 caracteres.',
                    'email_invalido' => 'Por favor, insira um email válido.',
                    'email_existe' => 'Este email já está cadastrado. Tente fazer login.'
                ];

                if (isset($_GET['erro']) && isset($erros[$_GET['erro']])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '<i class="bi bi-exclamation-circle"></i> ' . $erros[$_GET['erro']];
                    echo '</div>';
                }
                ?>

                <!-- FORMULÁRIO -->
                <form id="cadastroForm" action="../backend/auth/cadastro.php" method="POST">
                    <!-- Nome Completo -->
                    <div class="form-group">
                        <label for="nomeCompleto">Nome Completo *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-person"></i>
                            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto"
                                placeholder="Seu nome completo"
                                value="<?php echo isset($_POST['nomeCompleto']) ? htmlspecialchars($_POST['nomeCompleto']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-envelope"></i>
                            <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com"
                                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="form-group">
                        <label for="telefone">Telefone *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-telephone"></i>
                            <input type="tel" class="form-control" id="telefone" name="telefone"
                                placeholder="(11) 98765-4321"
                                value="<?php echo isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <!-- Empresa (Opcional) -->
                    <div class="form-group">
                        <label for="empresa">Empresa (Opcional)</label>
                        <div class="input-wrapper">
                            <i class="bi bi-building"></i>
                            <input type="text" class="form-control" id="empresa" name="empresa"
                                placeholder="Nome da sua empresa"
                                value="<?php echo isset($_POST['empresa']) ? htmlspecialchars($_POST['empresa']) : ''; ?>">
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="form-group">
                        <label for="endereco">Endereço *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-geo-alt"></i>
                            <input type="text" class="form-control" id="endereco" name="endereco"
                                placeholder="Rua, número, cidade"
                                value="<?php echo isset($_POST['endereco']) ? htmlspecialchars($_POST['endereco']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <!-- CEP -->
                    <div class="form-group">
                        <label for="cep">CEP *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-pin-map"></i>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000"
                                maxlength="9"
                                value="<?php echo isset($_POST['cep']) ? htmlspecialchars($_POST['cep']) : ''; ?>"
                                required>
                        </div>
                    </div>

                    <!-- Senha -->
                    <div class="form-group">
                        <label for="senha">Senha *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-lock"></i>
                            <input type="password" class="form-control" id="senha" name="senha"
                                placeholder="Mínimo 8 caracteres" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('senha')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="form-group">
                        <label for="confirmarSenha">Confirmar Senha *</label>
                        <div class="input-wrapper">
                            <i class="bi bi-lock"></i>
                            <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha"
                                placeholder="Digite a senha novamente" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('confirmarSenha')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Termos e Condições -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            Eu aceito os <a href="#">Termos de Uso</a> e a <a href="#">Política de Privacidade</a>
                        </label>
                    </div>
                    <!-- MENSAGENS DE ERRO/SUCESSO -->
                    <div id="alertMessage" class="alert-message"></div>

                    <!-- Botão de Cadastro -->
                    <button type="submit" class="btn-cadastro">Criar Minha Conta</button>
                </form>

                <!-- LINK PARA LOGIN -->
                <div class="login-link">
                    Já tem uma conta? <a href="login.php">Fazer login</a>
                </div>

                <!-- FOOTER -->
                <p class="footer-text">© 2026 KaoArt. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Alternar visibilidade da senha
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = event.target.closest('button');
            const icon = button.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        // Validar formulário ao enviar
        document.getElementById('cadastroForm').addEventListener('submit', function (e) {
            const senha = document.getElementById('senha').value;
            const confirmarSenha = document.getElementById('confirmarSenha').value;
            const alertDiv = document.getElementById('alertMessage');

            // Limpar mensagem anterior
            alertDiv.className = 'alert-message';
            alertDiv.textContent = '';

            // Validações
            if (senha !== confirmarSenha) {
                e.preventDefault();
                alertDiv.className = 'alert-message error';
                alertDiv.textContent = 'As senhas não coincidem!';
                return false;
            }

            if (senha.length < 6) {
                e.preventDefault();
                alertDiv.className = 'alert-message error';
                alertDiv.textContent = 'A senha deve ter no mínimo 6 caracteres!';
                return false;
            }

            if (!document.getElementById('terms').checked) {
                e.preventDefault();
                alertDiv.className = 'alert-message error';
                alertDiv.textContent = 'Você precisa aceitar os termos e condições!';
                return false;
            }

            // Se passou em todas as validações, o formulário é enviado normalmente
            // O backend (cadastro.php) tratará de redirecionar se o cadastro for bem-sucedido
            return true;
        });
    </script>

</body>

</html>