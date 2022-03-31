<?php

session_start();
if (!isset($_SESSION['login-done'])) header('Location: login.php');
else {
    session_destroy();
    header('Location: welcome.php');
}

?>