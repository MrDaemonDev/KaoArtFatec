<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrador</title>
    <link rel="stylesheet" href="css/login.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(img/etc/fundo.jpeg);
            background-size: cover;
        }

        .login-container {
            position: relative;
            background: white;
            padding: 2rem 2rem 2.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .logo-login {
            position: absolute;
            top: -68px;
            left: 28%;
            width: 225px;
            height: auto;
            background: transparent;
        }

        h1 {
            margin-top: 40px;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .input-group {
            text-align: left;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        button {
            width: 100%;
            padding: 0.7rem;
            background-color: #512872;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #935fbd;
        }

        #message {
            margin-top: 1rem;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <img src="img/etc/passaroKao.png" alt="Logo KaoArt" class="logo-login" id="passarinho" />
        <h1>Acesso restrito</h1>
        <form id="loginForm" action="../backend/auth.php" method="POST">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" placeholder="Digite seu usuário" required />
            </div>

            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha" required />
            </div>

            <button type="submit">Entrar</button>
            <p id="message"></p>
        </form>
    </div>

</body>

</html>