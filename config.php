<?php

$server = 'localhost';
$username = 'root'; 
$password = ''; 
$db_name = 'app_pengelolaan_keuangan';

$connection = mysqli_connect($server, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    throw new Exception('Mysql Connection Error: '.mysqli_connect_error() );
}
?>