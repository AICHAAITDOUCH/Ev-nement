<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement_formulaire.php" method="POST">
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="contact">Contact:</label><br>
        <input type="text" id="contact" name="contact" required><br>
        <label for="titre">Event:</label><br>
        <?php
        include 'db_connect.php'; 
       
        if ($connexion === false) {
            die("Erreur de connexion : " . mysqli_connect_error());
        }

        $requete = "SELECT * FROM venue";
        $resultat = $connexion->query($requete); 
        if ($resultat === FALSE) {
            echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
        } else {
            echo '<select id="titre" name="titre" required>';
            if ($resultat->num_rows > 0) {
                while($row = $resultat->fetch_assoc()) {
                    echo '<option value="'.htmlspecialchars($row['titre']).'">'.htmlspecialchars($row['titre']).'</option>';
                }
            } else {
                echo '<option value="">Aucun événement disponible</option>';
            }
            echo '</select>';
        }

        $connexion->close();
        ?>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>