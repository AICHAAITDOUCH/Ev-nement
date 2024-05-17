<?php
include 'db_connect.php'; 

if ($connexion === false) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$titre = $_POST['titre'];

$requete = "INSERT INTO client (name, email, contact, status, event) VALUES ('$name', '$email', '$contact', 'Inscrit', '$titre')";
if ($connexion->query($requete) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Erreur lors de l'ajout du client : " . $connexion->error;
}

$connexion->close();
?>
