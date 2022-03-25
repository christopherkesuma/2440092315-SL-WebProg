<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        a {
            text-decoration: none;
            color: black;
            height: 80px;
            width: 150px;
            margin: 0 20px;
            font-size: 24pt;
            line-height: 80px;
        }
    </style>
</head>
<body style="margin:0;text-align:center;">
    <div style="background-color: #e5edeb;height:100vh">
        <div style="padding:50px 0 100px 0; font-size:20pt">Aplikasi Pengelola Keuangan</div>
        <div style="padding:40px 0; font-size:30pt">Selamat Datang di Aplikasi Pengelola Keuangan</div>
        <div style="display: flex;justify-content:center">
            <a href="./login.php" style="background-color:<?= isset($_SESSION['register-done']) ? '#99d6ed' : '#c4c4c4'; ?>">Login</a>
            <a href="./register.php" style="background-color:#c6ed99">Register</a>
        </div>
        <div style="margin-top: 30px;">
            <?= isset($_SESSION['register-done']) ? 'Registrasi berhasil! silahkan Login' : ''; ?>
        </div>
    </div>
</body>
</html>