<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste Client</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="row mb-4 mt-4">
        <div class="col-md-12"></div>
      </div>
      <div class="row">
     
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <b>Liste Client</b>
            </div>
            <div class="card-body">
              <table class="table table-condensed table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="">Name</th>
                    <th class="">Email</th>
                    <th class="">Contact</th>
                    <th class="">Status</th>
                    <th class="">Event</th>
                    <th class="">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
include 'db_connect.php';


$requete = "SELECT * FROM client";
$resultat = $connexion->query($requete);

if ($resultat === FALSE) {
    echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
} else {
    // Afficher les clients
    if ($resultat->num_rows > 0) {
        while($row = $resultat->fetch_assoc()) {
            ?>
            <tr>
                <td class="text-center"><?php echo $row['id']; ?></td>
                <td class=""><?php echo $row['name']; ?></td>
                <td class=""><?php echo $row['email']; ?></td>
                <td class=""><?php echo $row['contact']; ?></td>
                <td class=""><?php echo $row['status']; ?></td>
                <td class=""><?php echo $row['event']; ?></td>
                <td class="">
                    
                   <form action="page.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit">Confirmer</button>
                    </form> 
                </td>
            </tr>
            <?php
        }
    } else {
        echo "Aucun client trouvé.";
    }
}

$connexion->close();
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</body>
</html>

<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }
  .container-fluid {
    margin-top: 20px;
  }
  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .card-header {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }
  .card-body {
    padding: 20px;
  }
  .table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  th {
    background-color: #f2f2f2;
  }
  .text-center {
    text-align: center;
  }
  .btn {
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
  }
</style>
