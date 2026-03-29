<?php
session_start();

$nomeCompleto = $_POST['nomeCompleto'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$empresa = $_POST['empresa'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$senha = $_POST['senha'] ?? '';
$confirmarSenha = $_POST['confirmarSenha'] ?? '';


if (empty($nomeCompleto) || empty($email) || empty($telefone) || empty($endereco) || empty($senha)) {
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



$_SESSION['cadastro_sucesso'] = true;
$_SESSION['usuario_nome'] = $nomeCompleto;

// Redireciona para produtos.php se sucesso
header("Location: ../../public/produtos.php?sucesso=cadastro");
exit;
?>
