<?php
session_start();
if (!isset($_SESSION['login-done'])) header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body style="margin: 0;">
    <div style="background-color: #cad1ff;height:100vh">
        <div style="background-color: #f9ffca;height:70px;display:flex;align-items:center;font-size:20pt">
            <div style="margin: 0 30px;">Aplikasi Pengelolaan Keuangan</div>
            <a href="./home.php" style="text-decoration:underline;margin-left:250px">Home</a>
            <a href="./profile.php" style="padding-left: 30px;">Profile</a>
            <a href="./logout.php" style="margin-left: auto;padding-right:30px">Logout</a>
        </div>
        <div style="font-size: 24pt;margin-top:200px;text-align:center">
            Halo 
            <strong>
                <?= $_SESSION['nama-depan'].' '.$_SESSION['nama-tengah'].' '.$_SESSION['nama-belakang']; ?>
            </strong>
            , Selamat datang di Aplikasi Pengelolaan Keuangan
        </div>
    </div>
</body>
</html>