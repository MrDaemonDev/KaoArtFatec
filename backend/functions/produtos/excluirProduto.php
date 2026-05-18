<?php

require "../../../config/database.php";

$id = $_GET['id'];

// Buscar imagem

$sqlImagem = "SELECT imagem FROM produtos WHERE id = '$id'";
$resultadoImagem = mysqli_query($conn, $sqlImagem);

$produto = mysqli_fetch_assoc($resultadoImagem);

// Remove a imagem

if ($produto && file_exists("../../../public/img/" . $produto['imagem'])) {
    unlink("../../../public/" . $produto['imagem']);
}

$sql = "DELETE FROM produtos WHERE id = '$id'";if ($produto && file_exists("../../../public/img/" . $produto['imagem'])) {
    unlink("../../../public/img/" . $produto['imagem']);
}

if (mysqli_query($conn, $sql)) {
    header("location: ../../../public/admin/produtos.php");
    exit;
} else {
    echo mysqli_error($conn);
}
