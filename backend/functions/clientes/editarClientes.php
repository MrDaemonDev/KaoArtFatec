<?php

session_start();

require "../../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
  $empresa = mysqli_real_escape_string($conn, $_POST['empresa'] ?? '');
  $endereco = mysqli_real_escape_string($conn, $_POST['endereco'] ?? '');
  $cep = mysqli_real_escape_string($conn, $_POST['cep'] ?? '');
  $senha = $_POST['senha'] ?? '';
  $role = mysqli_real_escape_string($conn, $_POST['tipo'] ?? 'user');
  $status = mysqli_real_escape_string($conn, $_POST['status'] ?? 'active');

  // Busca a senha atual para não sobrescrever se o campo estiver vazio
  $sqlSelect = "SELECT senha FROM usuarios WHERE id = $id";
  $resultSelect = mysqli_query($conn, $sqlSelect);

  if (!$resultSelect || mysqli_num_rows($resultSelect) === 0) {
    die('Usuário não encontrado.');
  }

  $usuarioAtual = mysqli_fetch_assoc($resultSelect);
  $senhaBanco = $usuarioAtual['senha'];

  if (!empty(trim($senha))) {
    $senhaBanco = mysqli_real_escape_string($conn, $senha);
  }

  $sql = "UPDATE usuarios SET
                nome_completo = '$nome',
                email = '$email',
                telefone = '$telefone',
                empresa = '$empresa',
                endereco = '$endereco',
                cep = '$cep',
                senha = '$senhaBanco',
                role = '$role',
                status = '$status'
            WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header('Location: ../../../public/admin/clientes.php');
    exit;
  } else {
    echo 'Erro ao atualizar usuário: ' . mysqli_error($conn);
  }
}
