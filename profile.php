<?php
session_start();
include('config.php');
if (!isset($_SESSION['login-done'])) header('Location: login.php');
$str_query = 'select * from User where Username = "'.$_SESSION['login-done'].'"';
$query = mysqli_query($connection, $str_query);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        a {
            color: black;
            text-decoration: none;
        }
        .container {
            width: 30%;
            display: flex;
            margin-bottom: 20px;
        }
        .label {
            width: 40%;
        }
        .data {
            width: 60%;
            overflow-wrap: break-word;
            hyphens: auto;
        }
        .button {
            background-color: #fbfdac;
            width: 100px;
            height: 30px;
            line-height: 20px;
            text-decoration: none;
            color: black;
            text-align: center;
            border: black 1px solid;
            cursor: pointer;
            box-shadow: 0 3px 3px grey;
            position: absolute;
            right: 70px;
            top: 123px;
            font-size: 12pt;
        }
    </style>
</head>
<body style="margin: 0;">
    <div style="background-color: #cad1ff;height:100vh">
        <div style="background-color: #f9ffca;height:70px;display:flex;align-items:center;font-size:20pt">
            <div style="margin: 0 30px;">Aplikasi Pengelolaan Keuangan</div>
            <a href="./home.php" style="margin-left:250px">Home</a>
            <a href="./profile.php" style="text-decoration:underline;padding-left: 30px;">Profile</a>
            <a href="./logout.php" style="margin-left: auto;padding-right:30px">Logout</a>
        </div>
        <a href="./editProfile.php"> <button class="button"> Edit Profile</button></a>
        <div style="text-align: center;margin:50px 0;font-size:24pt"><strong>Profile Pribadi</strong></div>
        <div style="display: flex;flex-wrap:wrap;justify-content:space-around;padding:0 30px">
            <div class="container">
                <div class="label">Nama Depan</div>
                <div class="data"><strong><?= $row['NamaDepan'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Nama Tengah</div>
                <div class="data"><strong><?= $row['NamaTengah'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Nama Belakang</div>
                <div class="data"><strong><?= $row['NamaBelakang'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Tempat Lahir</div>
                <div class="data"><strong><?= $row['TempatLahir'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Tanggal Lahir</div>
                <div class="data"><strong><?= $row['TanggalLahir'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">NIK</div>
                <div class="data"><strong><?= $row['NIK'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Warga Negara</div>
                <div class="data"><strong><?= $row['WargaNegara'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Email</div>
                <div class="data"><strong><?= $row['Email'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">No HP</div>
                <div class="data"><strong><?= $row['NoHP'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Alamat</div>
                <div class="data"><strong><?= $row['Alamat'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Kode Pos</div>
                <div class="data"><strong><?= $row['KodePos'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Foto Profil</div>
                <div class="data"><img src="./foto-profil/<?= $row['FotoProfil'] ?>" alt="foto-profil" style="max-height:250px;max-width:200px"></div>
            </div>
        </div>
    </div>
</body>
</html>