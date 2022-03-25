<?php
session_start();
if (isset($_SESSION['register-done'])) header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
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
    <div style="background-color: #c2f0f7;height:100vh">
        <div style="text-align: center;padding: 50px 0; font-size:24pt">Register</div>
        <form action="./registerProcess.php" method="POST" enctype="multipart/form-data" style="display: flex;flex-wrap:wrap;justify-content:space-around">
            <div class="input-container">
                <div class="form-label">Nama Depan</div>
                <div class="form-input">
                    <input type="text" name="nama-depan" value="<?= isset($_SESSION['nama-depan'])? $_SESSION['nama-depan'] :''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Nama Tengah</div>
                <div class="form-input">
                    <input type="text" name="nama-tengah" value="<?= isset($_SESSION['nama-tengah']) ? $_SESSION['nama-tengah'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Nama Belakang</div>
                <div class="form-input">
                    <input type="text" name="nama-belakang" value="<?= isset($_SESSION['nama-belakang']) ? $_SESSION['nama-belakang'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Tempat Lahir</div>
                <div class="form-input">
                    <input type="text" name="tempat-lahir" value="<?= isset($_SESSION['tempat-lahir']) ? $_SESSION['tempat-lahir'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Tanggal Lahir</div>
                <div class="form-input">
                    <input type="date" name="tanggal-lahir" value="<?= isset($_SESSION['tanggal-lahir']) ? $_SESSION['tanggal-lahir'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">NIK</div>
                <div class="form-input">
                    <input type="number" name="nik" value="<?= isset($_SESSION['nik']) ? $_SESSION['nik'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Warga Negara</div>
                <div class="form-input">
                    <input type="text" name="warga-negara" value="<?= isset($_SESSION['warga-negara']) ? $_SESSION['warga-negara'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Email</div>
                <div class="form-input">
                    <input type="email" name="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">No HP</div>
                <div class="form-input">
                    <input type="text" name="no-hp" value="<?= isset($_SESSION['no-hp']) ? $_SESSION['no-hp'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Alamat</div>
                <textarea name="alamat" cols="28" rows="8" class="font-input" required><?= isset($_SESSION['alamat']) ? $_SESSION['alamat'] : ''; ?></textarea>
            </div>
            <div class="input-container">
                <div class="form-label">Kode Pos</div>
                <div class="form-input">
                    <input type="number" name="kode-pos" value="<?= isset($_SESSION['kode-pos']) ? $_SESSION['kode-pos'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Foto Profil</div>
                <div class="form-input">
                    <input type="file" name="foto-profil" id="" accept="image/*" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Username</div>
                <div class="form-input">
                    <input type="text" name="username" value="<?= isset($_SESSION['username-regis']) ? $_SESSION['username-regis'] : ''; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Password 1</div>
                <div class="form-input">
                    <input type="password" name="password1" id="" required>
                </div>
            </div>
            <div class="input-container">
                <div class="form-label">Password 2</div>
                <div class="form-input">
                    <input type="password" name="password2" id="" required>
                </div>
            </div>
            <div style="width: 60%;color:red;text-align:center"><?= isset($_SESSION['msg']) ? $_SESSION['msg'] : '';?></div>
            <div style="width: 30%;display:flex;justify-content:space-around;">
                <a href="./welcome.php" class="form-button" style="background-color: #fdd7ac;">Kembali</a>
                <input type="submit" value="Register" name="register" class="form-button" style="background-color: #adf59f;">
            </div>
        </form>
    </div>
</body>
</html>