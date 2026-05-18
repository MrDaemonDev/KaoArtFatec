<?php

session_start();

require "../../../config/database.php";

$nome = $_POST['nome'];
$imagem = $_FILES['imagem'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];

$estoque = 0;

$imagem = $_FILES['imagem'];

$nomeImagem = time() . "_" . $imagem['name'];

$caminho = "../../../public/img/" . $nomeImagem;

move_uploaded_file($imagem['tmp_name'], $caminho);

// CAMINHO PARA SALVAR NO BANCO
$imagemBanco = "img/" . $nomeImagem;


// INSERT
$sql = "INSERT INTO produtos (
    nome,
    categoria,
    descricao,
    preco,
    estoque,
    imagem
) VALUES (
    '$nome',
    '$categoria',
    '$descricao',
    '$preco',
    '$estoque',
    '$imagemBanco'
)";

if (mysqli_query($conn, $sql)) {

    header("Location: ../../../public/admin/produtos.php");
    exit;

} else {

    echo mysqli_error($conn);
}