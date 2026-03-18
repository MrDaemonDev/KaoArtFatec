<?php
session_start();

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if ($password == $user['password']) {

            if ($user['status'] != 'active') {
                die("Usuário bloqueado");
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: ../../public/admin/dashboard.php");
            } else {
                header("Location: ../../public/dashboard.php");
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