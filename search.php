

<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.
    0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">


    <title>Evento | Easy Coding</title>
</head>

<body>

    <nav class="navbar navbar-expand fixed-top">
        <a href="" class="navbar-brand"><span>E</span>vento</a>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            
                <form id="searchForm" class="d-flex" action="search.php" method="GET">
    <input class="form-control me-2" type="search" placeholder="Rechercher un événement" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>

            </ul>
        </div>
    </nav>

    <section>
        <div class="header">
            <div>
                <div class="img">

                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="images/header.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="images/header1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/header2.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="Overlay"></div>
            </div>
            <div class="Content">
                <h6>World Biggest <span>Conference</span> Starts in....</h6>
                
            </div>
        </div>
    </section>


    <section class="about container-fluid">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-sm-4">
                    <h6>About us </h6>
                    <h5>Lets Take The Next Step With You</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis hic! Autem, unde quas
                        minus optio numquam illo eligendi officia consequatur! Fuga voluptate quibusdam tempora aut quos
                        ea, vero alias.</p>
                   
                </div>

                <div class="col-sm-5">
                    <div class="box">
                        <img src="images/about.png" class="img-fluid" alt="">
                    </div>
                </div>


            </div>


        </div>
        
    </section>
 
    

    <div class="container">
     
        <div class="row">
        <?php
include 'db_connect.php'; 

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $requete = "SELECT * FROM venue WHERE titre LIKE '%$search%'";
    $resultat = $connexion->query($requete); 
    if ($resultat === FALSE) {
        echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
    } else {
        if ($resultat->num_rows > 0) {
            while($row = $resultat->fetch_assoc()) {
                echo "<div class='col-md-4'>";
                echo "<div class='card'>";
                echo "<img src='images/".$row['image']."' class='card-img-top' alt='Image de l'événement'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['titre']."</h5>";
                echo "<p class='card-text'>".$row['adresse']."</p>";
                echo "<p class='card-text'>".$row['heure']."</p>";
                echo "<button class='btn btn-primary btn-block btn-sm col-sm-2 float-right' onclick=\"window.location.href='updt_client.php'\" id='new_venue'>";
                echo "<i class='fa fa-plus'></i> register";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "Aucun événement trouvé.";
        }
    }
}
?>

        </div>
    </div>



<!-- Le popup -->
<!-- <div class="event">
    <h3>Titre de l'événement</h3>
    <p>Description de l'événement</p> -->
    <!-- Formulaire d'inscription -->
    <!-- <form action="traitement_formulaire.php" method="POST">
        <input type="hidden" name="event_id" value="ID_de_l_evenement">
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">S'inscrire</button>
    </form> -->
<!-- </div> -->



<style>
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            box-sizing: border-box;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn.cancel {
            background-color: #ccc;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <footer>
        <a href="#">&copy; Easy Coding</a>
    </footer>




   
   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   

</body>

</html>