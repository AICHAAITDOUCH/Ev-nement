<?php
include 'db_connect.php'; 


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $requete = $connexion->prepare("DELETE FROM client WHERE id = ?");
    $requete->bind_param("i", $id);

    
    if ($requete->execute()) {
        header("Location: client.php");
        exit; 
    }else {
        echo "Erreur lors de la suppression du lieu : " . $requete->error;
    }

    $requete->close();
} else {
    echo "ID du lieu non spécifié.";
}
$connexion->close();
?>
