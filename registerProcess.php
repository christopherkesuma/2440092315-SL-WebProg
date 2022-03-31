<?php

session_start();
include('config.php');

if (isset($_POST['register'])) {
    $str_query = 'select * from User';
    $query = mysqli_query($connection, $str_query);
    $row = mysqli_fetch_array($query);
    
    $namaDepan = $_POST['nama-depan'];
    $namaTengah = $_POST['nama-tengah'];
    $namaBelakang = $_POST['nama-belakang'];
    $tempatLahir = $_POST['tempat-lahir'];
    $tanggalLahir = $_POST['tanggal-lahir'];
    $wargaNegara = $_POST['warga-negara'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $nik = $_POST['nik'];
    $telp = $_POST['no-hp'];
    $pos = $_POST['kode-pos'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    // validasi input
    $_SESSION['msg'] = '';
    $_SESSION['msg-username'] = '';
    $_SESSION['msg-nik'] = '';
    $_SESSION['msg-email'] = '';
    if (strlen($nik) != 16) {
        $_SESSION['msg'] .= 'NIK harus 16 digit <br/>';
    } 
    if (strlen($telp) < 11 || !is_numeric($telp)) {
        $_SESSION['msg'] .= 'No HP minimal 11 digit angka <br/>';
    } else $_SESSION['no-hp'] = $telp;
    if (strlen($pos) != 5) {
        $_SESSION['msg'] .= 'Kode Pos harus 5 digit <br/>';
    } else $_SESSION['kode-pos'] = $pos;
    if ($pass1 != $pass2) {
        $_SESSION['msg'] .= 'Password 1 harus sama dengan Password 2 <br/>';
    } else $pass1 = password_hash($pass2, PASSWORD_DEFAULT);

    // kalo DB sudah ada isi
    if (!is_null($row)) {
        do {
            if ($username == $row['Username']) {
                $_SESSION['msg-username'] = 'Username sudah ada <br/>';
            }
            if ($email == $row['Email']) {
                $_SESSION['msg-email'] = 'Email sudah ada <br/>';
            }
            if ($nik == $row['NIK']) {
                $_SESSION['msg-nik'] = 'NIK sudah ada';
            }
        } while ($row = mysqli_fetch_array($query));
        if ($_SESSION['msg-username'] == '') {
            $_SESSION['username-regis'] = $username;
        }
        if ($_SESSION['msg-email'] == '') {
            $_SESSION['email'] = $email;
        }
        if ($_SESSION['msg-nik'] == '') {
            $_SESSION['nik'] = $nik;
        }
    } else {
        $_SESSION['username-regis'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['nik'] = $nik;
    }

    $_SESSION['nama-depan'] = $namaDepan;
    $_SESSION['nama-tengah'] = $namaTengah;
    $_SESSION['nama-belakang'] = $namaBelakang;
    $_SESSION['tempat-lahir'] = $tempatLahir;
    $_SESSION['tanggal-lahir'] = $tanggalLahir;
    $_SESSION['warga-negara'] = $wargaNegara;
    $_SESSION['alamat'] = $alamat;

    if(strlen($_SESSION['msg']) > 1 || strlen($_SESSION['msg-username']) > 1 || strlen($_SESSION['msg-email']) > 1 || strlen($_SESSION['msg-nik']) > 1) header('Location: register.php');
    else {
        $namaFile = $_FILES['foto-profil']['name'];
        $tempName = $_FILES['foto-profil']['tmp_name'];
        $dirUpload = 'foto-profil/';
        if (!file_exists($dirUpload)) {
            mkdir($dirUpload, 0777, true);
        }
        $uploaded = move_uploaded_file($tempName, $dirUpload.$namaFile);

        $_SESSION['register-done'] = true;

        // insert ke DB
        $str_query = 'insert into User values("'.$namaDepan.'","'.$namaTengah.'","'.$namaBelakang.'","'.$tempatLahir.'","'.$tanggalLahir.'","'.$nik.'","'.$wargaNegara.'","'.$email.'","'.$telp.'","'.$alamat.'","'.$pos.'","'.$namaFile.'","'.$username.'","'.$pass1.'")';
        if(mysqli_query($connection, $str_query)) {
            header('Location: welcome.php');
        } else {
            echo 'daftar gagal! <br/>'.mysqli_error($connection);
        }
    }
}

?>