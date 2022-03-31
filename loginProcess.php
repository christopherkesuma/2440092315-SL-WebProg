<?php

session_start();
include('config.php');

if (isset($_POST['login'])) {
    $str_query = 'select Username, Password from User where Username = "'.$_POST['username'].'"';
    $query = mysqli_query($connection, $str_query);
    $row = mysqli_fetch_array($query);
    
    $_SESSION['msg-login'] = '';
    if (!is_null($row) && $row['Username'] == $_POST['username'] 
        && password_verify($_POST['password'], $row['Password'])) {
        $_SESSION['login-done'] = $_POST['username'];
        header('Location: home.php');
    } else {
        $_SESSION['msg-login'] = 'Login Gagal!';
        header('Location: login.php');
    }
}

?>