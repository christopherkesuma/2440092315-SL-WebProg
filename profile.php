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
        <div style="text-align: center;margin:50px 0;font-size:24pt"><strong>Profil Pribadi</strong></div>
        <div style="display: flex;flex-wrap:wrap;justify-content:space-around;padding:0 30px">
            <div class="container">
                <div class="label">Nama Depan</div>
                <div class="data"><strong><?= $_SESSION['nama-depan'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Nama Tengah</div>
                <div class="data"><strong><?= $_SESSION['nama-tengah'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Nama Belakang</div>
                <div class="data"><strong><?= $_SESSION['nama-belakang'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Tempat Lahir</div>
                <div class="data"><strong><?= $_SESSION['tempat-lahir'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Tanggal Lahir</div>
                <div class="data"><strong><?= $_SESSION['tanggal-lahir'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">NIK</div>
                <div class="data"><strong><?= $_SESSION['nik'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Warga Negara</div>
                <div class="data"><strong><?= $_SESSION['warga-negara'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Email</div>
                <div class="data"><strong><?= $_SESSION['email'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">No HP</div>
                <div class="data"><strong><?= $_SESSION['no-hp'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Alamat</div>
                <div class="data"><strong><?= $_SESSION['alamat'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Kode Pos</div>
                <div class="data"><strong><?= $_SESSION['kode-pos'] ?></strong></div>
            </div>
            <div class="container">
                <div class="label">Foto Profil</div>
                <div class="data"><img src="./foto-profil/<?= $_SESSION['foto-profil'] ?>" alt="foto-profil" style="max-height:250px;overflow:hidden"></div>
            </div>
        </div>
    </div>
</body>
</html>