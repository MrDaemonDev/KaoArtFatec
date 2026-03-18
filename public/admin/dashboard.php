<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<h1>Área do Admin</h1>
<a href="../logout.php">Sair</a>
