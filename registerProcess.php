<?php

session_start();

if (isset($_POST['register'])) {
    $nik = $_POST['nik'];
    $telp = $_POST['no-hp'];
    $pos = $_POST['kode-pos'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    $_SESSION['msg'] = '';
    if (strlen($nik) != 16) {
        $_SESSION['msg'] .= 'NIK harus 16 digit <br/>';
    } else $_SESSION['nik'] = $nik;
    if (strlen($telp) < 11 || !is_numeric($telp)) {
        $_SESSION['msg'] .= 'No HP minimal 11 digit angka <br/>';
    } else $_SESSION['no-hp'] = $telp;
    if (strlen($pos) != 5) {
        $_SESSION['msg'] .= 'Kode Pos harus 5 digit <br/>';
    } else $_SESSION['kode-pos'] = $pos;
    if ($pass1 != $pass2) {
        $_SESSION['msg'] .= 'Password 1 harus sama dengan Password 2';
    } else $_SESSION['password-regis'] = $pass1;

    $_SESSION['nama-depan'] = $_POST['nama-depan'];
    $_SESSION['nama-tengah'] = $_POST['nama-tengah'];
    $_SESSION['nama-belakang'] = $_POST['nama-belakang'];
    $_SESSION['tempat-lahir'] = $_POST['tempat-lahir'];
    $_SESSION['tanggal-lahir'] = $_POST['tanggal-lahir'];
    $_SESSION['warga-negara'] = $_POST['warga-negara'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['alamat'] = $_POST['alamat'];
    $_SESSION['username-regis'] = $_POST['username'];

    if(strlen($_SESSION['msg']) > 1) header('Location: register.php');
    else {
        $namaFile = $_FILES['foto-profil']['name'];
        $tempName = $_FILES['foto-profil']['tmp_name'];
        $dirUpload = 'foto-profil/';
        $uploaded = move_uploaded_file($tempName, $dirUpload.$namaFile);

        $_SESSION['foto-profil'] = $namaFile;
        $_SESSION['register-done'] = true;

        header('Location: welcome.php');
    } 
}

?>