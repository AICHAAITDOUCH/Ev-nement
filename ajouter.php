<?php
include 'db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un événement</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Ajouter un événement</h1>
  <form action="traitement.php?action=ajouter" method="post" enctype="multipart/form-data">
    <label for="venue">Evénement:</label>
    <input type="text" id="venue" name="titre" required>
    <label for="address">Adresse:</label>
    <input type="text" id="address" name="address" required>
    <label for="address"> Heure:</label>
    <input type="datetime-local" id="birthdaytime" name="heure" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <button type="submit" name="Ajouter">Ajouter</button>
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
input[type="datetime-local"] {
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

</style>