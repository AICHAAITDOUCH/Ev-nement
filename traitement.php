<?php
include 'db_connect.php'; 

if(isset($_GET['action']) && $_GET['action'] == 'ajouter') {
    $venue = isset($_POST['titre']) ? $_POST['titre'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $heure = isset($_POST['heure']) ? $_POST['heure'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

    $requete = $connexion->prepare("INSERT INTO venue (titre, adresse, heure, description, image) VALUES (?, ?, ?, ?, ?)");
    $requete->bind_param("sssss", $venue, $address, $heure, $description, $image);

    if ($requete->execute()) {
        header("Location: evenement.php");
        exit; 
    } else {
        echo "Erreur lors de l'ajout du lieu : " . $requete->error;
    }

    $requete->close();
}

$connexion->close();
?>
