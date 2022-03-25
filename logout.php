<?php

session_start();
session_destroy();

$folder = 'foto-profil';
$files = glob($folder.'/*');
foreach ($files as $file) {
    if (is_file($file)) unlink($file);
}

header('Location: welcome.php');

?>