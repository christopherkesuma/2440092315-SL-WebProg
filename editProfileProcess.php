<?php
session_start();
include('config.php');
if (isset($_POST['simpan'])) {

    $str_query = 'update User set ';

    $namaDepan = $_POST['nama-depan'];
    $namaTengah = $_POST['nama-tengah'];
    $namaBelakang = $_POST['nama-belakang'];
    $tempatLahir = $_POST['tempat-lahir'];
    $tanggalLahir = $_POST['tanggal-lahir'];
    $wargaNegara = $_POST['warga-negara'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nik = $_POST['nik'];
    $telp = $_POST['no-hp'];
    $pos = $_POST['kode-pos'];

    //validasi input
    $_SESSION['msg'] = '';
    $_SESSION['msg-nik'] = '';
    $_SESSION['msg-email'] = '';
    if (strlen($nik) != 16) {
        $_SESSION['msg'] .= 'NIK harus 16 digit <br/>';
    } 
    if (strlen($telp) < 11 || !is_numeric($telp)) {
        $_SESSION['msg'] .= 'No HP minimal 11 digit angka <br/>';
    } else $str_query .= 'NoHP = "' . $telp . '", ';
    if (strlen($pos) != 5) {
        $_SESSION['msg'] .= 'Kode Pos harus 5 digit <br/>';
    } else $str_query .= 'KodePos = "' . $pos . '", ';

    $str_query1 = 'select * from User';
    $query1 = mysqli_query($connection, $str_query1);
    $str_query2 = 'select * from User where Username = "'.$_SESSION['login-done'].'"';
    $query2 = mysqli_query($connection, $str_query2);
    $data = mysqli_fetch_array($query2);
    // cek duplikat di database
    while ($row = mysqli_fetch_array($query1)) {
        if ($email == $row['Email'] && $row['Email'] != $data['Email']) {
            $_SESSION['msg-email'] = 'Email sudah ada <br/>';
        }
        if ($nik == $row['NIK'] && $row['NIK'] != $data['NIK']) {
            $_SESSION['msg-nik'] = 'NIK sudah ada';
        }
    }
    if ($_SESSION['msg-email'] == '') {
        $str_query .= 'Email = "' . $email . '", ';
    }
    if ($_SESSION['msg-nik'] == '') {
        $str_query .= 'NIK = "' . $nik . '", ';
    }
    
    $str_query .= 'NamaDepan = "' . $namaDepan . '", ';
    $str_query .= 'NamaTengah = "' . $namaTengah . '", ';
    $str_query .= 'NamaBelakang = "' . $namaBelakang . '", ';
    $str_query .= 'TempatLahir = "' . $tempatLahir . '", ';
    $str_query .= 'TanggalLahir = "' . $tanggalLahir . '", ';
    $str_query .= 'WargaNegara = "' . $wargaNegara . '", ';
    $str_query .= 'Alamat = "' . $alamat . '"';
    
    $folder = 'foto-profil';
    // cek jika ada foto yang diupload
    if ($_FILES[$folder]['size'] > 0) {
        // hapus foto lama
        $files = glob($folder.'/*');
        foreach ($files as $file) {
            if ($file == $folder.'/'.$data['FotoProfil']) unlink($file);
        }

        // upload foto baru
        $type = explode('.', $_FILES[$folder]['name']);
        $namaFile = $data['Username'].'.'.end($type);
        $tempName = $_FILES[$folder]['tmp_name'];
        $uploaded = move_uploaded_file($tempName, $folder.'/'.$namaFile);

        $str_query .= ', FotoProfil = "' . $namaFile . '"';
    }
    $str_query .= ' where Username = "' . $_SESSION['login-done'] . '"';
    // update DB
    if (mysqli_query($connection, $str_query)) {
        if(strlen($_SESSION['msg']) > 1 || strlen($_SESSION['msg-email']) > 1 || strlen($_SESSION['msg-nik']) > 1) {
            header('location: editProfile.php');
        }
        else {
            header('location: profile.php');
        }
    } else {
        echo 'edit gagal! <br/>'.mysqli_error($connection);
    }
}

?>