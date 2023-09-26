<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'phpproject';

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$con) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
?>