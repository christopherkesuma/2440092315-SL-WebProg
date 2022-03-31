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
    <title>Edit Profile</title>
    <style>
        a {
            color: black;
            text-decoration: none;
        }
        .input-container {
            width: 30%;
            display: flex;
            margin-bottom: 20px;
        }
        .form-label {
            width: 40%;
        }
        .form-input {
            width: 60%;
        }
        input {
            width: 90%;
        }
        .form-button {
            box-sizing: content-box;
            width: 40%;
            height: 20px;
            line-height: 20px;
            text-decoration: none;
            color: black;
            text-align: center;
            border: black 1.5px solid;
            cursor: pointer;
            box-shadow: 0 3px 3px grey;
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
        <div style="text-align: center;padding: 50px 0 30px 0; font-size:24pt"><strong>Edit Profile</strong></div>
        <form action="./editProfileProcess.php" method="POST" enctype="multipart/form-data" style="display: flex;flex-wrap:wrap;justify-content:space-around">
            <div class="input-container">
                <div class="form-label">Nama Depan</div>
                <div class="form-input">
                    <input type="text" name="nama-depan" value="<?= $row['NamaDepan']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Nama Tengah</div>
                <div class="form-input">
                    <input type="text" name="nama-tengah" value="<?= $row['NamaTengah']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Nama Belakang</div>
                <div class="form-input">
                    <input type="text" name="nama-belakang" value="<?= $row['NamaBelakang']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Tempat Lahir</div>
                <div class="form-input">
                    <input type="text" name="tempat-lahir" value="<?= $row['TempatLahir']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Tanggal Lahir</div>
                <div class="form-input">
                    <input type="date" name="tanggal-lahir" value="<?= $row['TanggalLahir']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">NIK</div>
                <div class="form-input">
                    <input type="number" name="nik" value="<?= $row['NIK']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Warga Negara</div>
                <div class="form-input">
                    <input type="text" name="warga-negara" value="<?= $row['WargaNegara']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Email</div>
                <div class="form-input">
                    <input type="email" name="email" value="<?= $row['Email']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">No HP</div>
                <div class="form-input">
                    <input type="text" name="no-hp" value="<?= $row['NoHP']; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Alamat</div>
                <textarea name="alamat" cols="28" rows="8" class="font-input" required><?= $row['Alamat']; ?></textarea>
            </div>
            <div class="input-container">
                <div class="form-label">Kode Pos</div>
                <div class="form-input">
                    <input type="number" name="kode-pos" value="<?= $row['KodePos']; ?>" required>
                </div>
            </div>
            <div class="input-container" style="flex-wrap: wrap;">
                <div class="form-label">Ganti Foto</div>
                <div class="form-input">
                    <input type="file" name="foto-profil" id="foto-profil" accept="image/*">
                </div>
                <div class="form-label" style="margin-top: 20px;">Foto Profil</div>
                <div class="form-input" style="margin-top: 10px;">
                    <img src="./foto-profil/<?= $row['FotoProfil'] ?>" alt="foto-profil" style="max-height:150px;max-width:200px">
                </div>
            </div>
            <div style="width: 60%;color:red;text-align:center"><?php
            echo isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
            echo isset($_SESSION['msg-email']) ? $_SESSION['msg-email'] : '';
            echo isset($_SESSION['msg-nik']) ? $_SESSION['msg-nik'] : '';
            ?></div>
            <div style="width: 30%;display:flex;justify-content:space-around;">
                <a href="./profile.php" class="form-button" style="background-color: #fdd7ac;">Kembali</a>
                <input type="submit" value="Simpan" name="simpan" class="form-button" style="background-color: #adf59f;">
            </div>
        </form>
    </div>
</body>
</html>