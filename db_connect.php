<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data1";

$connexion = new mysqli($servername, $username, $password, $dbname);

if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}
?>
