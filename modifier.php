<?php
include 'db_connect.php'; 

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $requete = "SELECT * FROM venue WHERE id = $id";
    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        $lieu = $resultat->fetch_assoc();
    } else {
        echo "Aucun lieu trouvé avec cet ID.";
        exit();
    }
} else {
    echo "ID du lieu non spécifié.";
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $venue = $_POST['titre'];
    $address = $_POST['address'];
    $heure = $_POST['heure'];
    $description = $_POST['description'];
    
    if($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp, "images/$image");
    } else {
        $image = $lieu['image'];
    }

    $requete = $connexion->prepare("UPDATE venue SET titre = ?, adresse = ?, heure=?,description = ?, image = ? WHERE id = ?");
    $requete->bind_param("sssssi", $venue, $address,$heure, $description, $image, $id);

    if ($requete->execute()) {
      header("Location: evenement.php");
      exit; 
  }else {
        echo "Erreur lors de la modification du lieu : " . $requete->error;
    }

    
    $requete->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un lieu</title>
</head>
<body>
 
    <form action="" method="post" enctype="multipart/form-data">
    <label for="venue">Titre:</label>
    <input type="text" id="venue" name="titre" value="<?php echo $lieu['titre']; ?>"><br>
    <label for="address">Adresse:</label>
    <input type="text" id="address" name="address" value="<?php echo $lieu['adresse']; ?>"><br>
    <label for="heure">Heure:</label>
    <input type="datetime-local" id="birthdaytime" name="heure" value="<?php echo $lieu['heure']; ?>"><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo $lieu['description']; ?></textarea><br>
    <label for="image">Nouvelle Image:</label>
    <input type="file" id="image" name="image"><br> 
    <img src="images/<?php echo $lieu['image']; ?>" alt="Image du lieu" style="max-width:100px; max-height:100px;"><br> 
    <input type="submit" value="Modifier">
</form>

</body>
</html>

<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label,
input,
textarea {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="file"] {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
}

button {
  background-color: #4caf50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
input[type="datetime-local"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
