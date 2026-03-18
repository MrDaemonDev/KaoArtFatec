<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
include ("../includes/header.php");
?>


<h1>Área do usuário</h1>
<a href="../backend/auth/logout.php">Sair</a>