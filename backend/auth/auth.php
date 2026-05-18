<?php
session_start();

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $usuarios = mysqli_fetch_assoc($result);

        if ($senha == $usuarios['senha']) {

            if ($usuarios['status'] != 'active') {
                die("Usuário bloqueado");
            }

            $_SESSION['user_id'] = $usuarios['id'];
            $_SESSION['role'] = $usuarios['role'];

            if ($usuarios['role'] == 'admin') {
                header("Location: ../../public/admin/dashboard.php");
                exit;
            } else {
                header("Location: ../../public/produtos.php");
                exit;
            }

        } else {
            header("Location: ../../public/login.php?erro=1");
            exit;
        }

    } else {
        header("Location: ../../public/login.php?erro=1");
        exit;
    }
}