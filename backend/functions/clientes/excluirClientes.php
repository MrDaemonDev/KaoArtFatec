<?php

require "../../../config/database.php";

$id = $_GET['id'];

$id = intval($id);

// Verifica se o usuário é administrador antes de excluir
$checkSql = "SELECT role FROM usuarios WHERE id = $id";
$checkRes = mysqli_query($conn, $checkSql);

if ($checkRes && mysqli_num_rows($checkRes) > 0) {
    $row = mysqli_fetch_assoc($checkRes);
    if ($row['role'] === 'admin') {
        // Não permite excluir administradores

        header("Location: ../../../public/admin/clientes.php?error=protected_admin");
        exit;
    }
}

$sql = "DELETE FROM usuarios WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: ../../../public/admin/clientes.php");
    exit;
} else {
    echo mysqli_error($conn);
}
