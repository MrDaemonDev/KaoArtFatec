<?php
    session_start();

    if (isset($_SESSION['user_id'])) {

        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            header("Location: admin/dashboard.php");
            exit;
        } else {
            header("Location: produtos.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Página de Login</title>
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>

  <div class="login-container">
    <img src="img/etc/passaroKao.png" alt="Logo KaoArt" class="logo-login" id="passarinho" />
    <h1>Login</h1>
    <form id="loginForm" action="../backend/auth/auth.php" method="POST">
      <div class="input-group">
        <label for="username">Usuário</label>
        <input type="text" id="username" name="username" placeholder="Digite seu usuário" required />
      </div>

      <div class="input-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" required />
      </div>

      <button type="submit">Entrar</button>
      <p id="message">
          <?php if (isset($_GET['erro'])) echo "Usuário ou senha inválidos"; ?>
      </p>
      <p class="cadastro-link">
          Não tem conta? <a href="cadastro.php">Cadastre-se</a>
      </p>
    </form>
  </div>

</body>

</html>