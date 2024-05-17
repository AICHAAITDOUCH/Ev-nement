<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Event</title>
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
            <div class="buttonb" >
            <b>Liste Des Event</b>
              <div class="button2">
              <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" onclick="window.location.href='ajouter.php'" id="new_venue">
  <i class="fa fa-plus"></i> Ajouter
</button>
   
<button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" onclick="window.location.href='client.php'" id="new_venue">
  <i class="fa fa-plus"></i> User
</button>
</div>
</div> 
            </div>
            <div class="card-body">
              <table class="table table-condensed table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="">Titre</th>
                    <th class="">Adresse</th>
                    <th class="">Heure</th>
                    <th class="">Description</th>
                    <th class="">Image</th>
                    <th class="">Action</th>
                  </tr>
                </thead>
                <tbody>
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
    if ($resultat->num_rows > 0) {
        while($row = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>"; 
            echo "<td>".$row['titre']."</td>";
            echo "<td>".$row['adresse']."</td>";
            echo "<td>".$row['heure']."</td>";
            echo "<td>".$row['description']."</td>";
       
           
            
            echo "<td><img src='images/".$row['image']."' alt='Image du lieu' style='max-width:100px; max-height:100px;'></td>";


            echo "<td><button class='btn btn-outline-primary edit_venue' type='button' onclick=\"window.location.href='modifier.php?id=".$row['id']."'\">Modifier</button> | <button class='btn btn-outline-danger delete_venue' type='button' onclick=\"window.location.href='supprimer.php?id=".$row['id']."'\">Supprimer</button></td>";
            echo "</tr>";
            
        }
    } else {
        echo "<tr><td colspan='6'>Aucun lieu trouvé.</td></tr>"; 
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

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

  .text-right {
    text-align: right;
  }

  .btn {
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
  }

  .btn-outline-primary {
    color: #007bff;
    border: 1px solid #007bff;
  }

  .btn-outline-danger {
    color: #dc3545;
    border: 1px solid #dc3545;
  }

  .float-right {
    float: right;
  }

  .truncate {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .button2{
    display: flex;
    flex-direction: row;
  gap: 50px;
  }
  .buttonb{
    display: flex;
    justify-content: space-between;

  }
</style>