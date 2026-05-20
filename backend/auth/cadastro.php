<?php
session_start();
require "../../config/database.php";

$nomeCompleto = trim($_POST['nomeCompleto'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$empresa = trim($_POST['empresa'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');
$cep = trim($_POST['cep'] ?? '');
$senha = $_POST['senha'] ?? '';
$confirmarSenha = $_POST['confirmarSenha'] ?? '';

if (empty($nomeCompleto) || empty($email) || empty($telefone) || empty($endereco) || empty($cep) || empty($senha)) {
    header("Location: ../../public/cadastro.php?erro=dados_incompletos");
    exit;
}

if ($senha !== $confirmarSenha) {
    header("Location: ../../public/cadastro.php?erro=senhas_diferentes");
    exit;
}

if (strlen($senha) < 6) {
    header("Location: ../../public/cadastro.php?erro=senha_curta");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../public/cadastro.php?erro=email_invalido");
    exit;
}

$emailEscaped = mysqli_real_escape_string($conn, $email);
$sqlCheck = "SELECT id FROM usuarios WHERE email = '$emailEscaped'";
$resultCheck = mysqli_query($conn, $sqlCheck);

if ($resultCheck && mysqli_num_rows($resultCheck) > 0) {
    header("Location: ../../public/cadastro.php?erro=email_existe");
    exit;
}

$nomeEsc = mysqli_real_escape_string($conn, $nomeCompleto);
$telefoneEsc = mysqli_real_escape_string($conn, $telefone);
$empresaEsc = mysqli_real_escape_string($conn, $empresa);
$enderecoEsc = mysqli_real_escape_string($conn, $endereco);
$cepEsc = mysqli_real_escape_string($conn, $cep);
$senhaEsc = mysqli_real_escape_string($conn, $senha);

$sqlInsert = "INSERT INTO usuarios (nome_completo, email, telefone, empresa, endereco, cep, senha, role, status) VALUES ('$nomeEsc', '$emailEscaped', '$telefoneEsc', '$empresaEsc', '$enderecoEsc', '$cepEsc', '$senhaEsc', 'user', 'active')";

if (mysqli_query($conn, $sqlInsert)) {
    $userId = mysqli_insert_id($conn);
    $_SESSION['user_id'] = $userId;
    $_SESSION['role'] = 'user';
    $_SESSION['cadastro_sucesso'] = true;
    header("Location: ../../public/produtos.php?sucesso=cadastro");
    exit;
}

header("Location: ../../public/cadastro.php?erro=erro_gravacao");
exit;
?>