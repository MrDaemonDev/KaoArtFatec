<?php

session_start();

require "../../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $categoria = $_POST['categoria'];
  $preco = $_POST['preco'];

  // Pega a imagem atual do banco
  $sqlSelect = "SELECT imagem FROM produtos WHERE id = $id";
  $resultSelect = mysqli_query($conn, $sqlSelect);
  $produtoAtual = mysqli_fetch_assoc($resultSelect);
  $imagemAtual = $produtoAtual['imagem'];

  // Verifica se foi enviada uma nova imagem
  $imagemBanco = $imagemAtual;
  if ($_FILES['imagem']['size'] > 0) {
    $imagem = $_FILES['imagem'];
    $nomeImagem = time() . "_" . $imagem['name'];
    $caminho = "../../../public/img/" . $nomeImagem;
    move_uploaded_file($imagem['tmp_name'], $caminho);
    $imagemBanco = "img/" . $nomeImagem;
  }

  // UPDATE
  $sql = "UPDATE produtos SET 
            nome = '$nome',
            categoria = '$categoria',
            descricao = '$descricao',
            preco = '$preco',
            imagem = '$imagemBanco'
            WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header("Location: ../../../public/admin/produtos.php");
    exit;
  } else {
    echo "Erro ao atualizar: " . mysqli_error($conn);
  }
}
?>