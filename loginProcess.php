<?php

session_start();
if (isset($_POST['login'])) {
    $_SESSION['msg-login'] = '';
    if ($_SESSION['username-regis'] == $_POST['username'] 
        && $_SESSION['password-regis'] == $_POST['password']) {
        $_SESSION['login-done'] = true;
        header('Location: home.php');
    } else {
        $_SESSION['msg-login'] = 'Login Gagal!';
        header('Location: login.php');
    }
}

?>