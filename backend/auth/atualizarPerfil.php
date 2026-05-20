<?php
session_start();
require "../../config/database.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: ../../public/login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: ../../public/configuracao.php");
  exit;
}

$userId = intval($_SESSION['user_id']);
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$empresa = trim($_POST['empresa'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');
$cep = trim($_POST['cep'] ?? '');
$senha = $_POST['senha'] ?? '';

if (empty($nome) || empty($email) || empty($telefone) || empty($endereco) || empty($cep)) {
  header("Location: ../../public/configuracao.php?erro=dados_incompletos");
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../../public/configuracao.php?erro=email_invalido");
  exit;
}

$emailEscaped = mysqli_real_escape_string($conn, $email);
$sqlEmail = "SELECT id FROM usuarios WHERE email = '$emailEscaped' AND id <> $userId";
$resultEmail = mysqli_query($conn, $sqlEmail);

if ($resultEmail && mysqli_num_rows($resultEmail) > 0) {
  header("Location: ../../public/configuracao.php?erro=email_existe");
  exit;
}

$nomeEsc = mysqli_real_escape_string($conn, $nome);
$telefoneEsc = mysqli_real_escape_string($conn, $telefone);
$empresaEsc = mysqli_real_escape_string($conn, $empresa);
$enderecoEsc = mysqli_real_escape_string($conn, $endereco);
$cepEsc = mysqli_real_escape_string($conn, $cep);

$senhaSql = '';
if (!empty(trim($senha))) {
  if (strlen($senha) < 6) {
    header("Location: ../../public/configuracao.php?erro=senha_curta");
    exit;
  }
  $senhaEsc = mysqli_real_escape_string($conn, $senha);
  $senhaSql = ", senha = '$senhaEsc'";
}

$sql = "UPDATE usuarios SET
            nome_completo = '$nomeEsc',
            email = '$emailEscaped',
            telefone = '$telefoneEsc',
            empresa = '$empresaEsc',
            endereco = '$enderecoEsc',
            cep = '$cepEsc'"
  . $senhaSql .
  " WHERE id = $userId";

if (mysqli_query($conn, $sql)) {
  header("Location: ../../public/configuracao.php?sucesso=1");
  exit;
}

header("Location: ../../public/configuracao.php?erro=update");
exit;
