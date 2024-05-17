<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $client_id = intval($_GET['id']);

    $requete = "SELECT name, email FROM client WHERE id = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
    } else {
        echo "Client non trouvé.";
        exit;
    }

    $stmt->close();
} else {
    echo "ID de client non fourni.";
    exit;
}

$connexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation</title>
</head>
<body>
  <div class="container">
    <h2>Confirmation</h2>
    <p><strong>Nom:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p>Votre demande a été validée avec succès.</p>
  </div>
</body>
</html>

<style>
  .container {
    font-family: Arial, sans-serif;
    margin: 50px auto;
    padding: 20px;
    max-width: 600px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h2 {
    color: #333;
  }
  p {
    font-size: 18px;
    line-height: 1.6;
    margin: 10px 0;
  }
</style>
