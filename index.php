<?php
// Nous allons conserver en session les articles favoris de l'utilisateur
    session_start();

    if(!isset($_SESSION["favorites"])){$_SESSION["favorites"]=[];}

// print_r($_SESSION);

// Nous crées la fonction pour vérifier si les articles sont en favori ou non
function checkFavorite($id)
{
    return in_array($id,$_SESSION["favorites"]);

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="assets/css/style.css">
<style>


</style>

<title>AJAX | Utilisation de la session</title>

</head>
<body>

    <main class="container p-4">
        <a class="btn btn-warning " id="btn-deconnect" ><i class="fas fa-power-off"></i></a>
        <div id="blog" class="row">
            <div class="col-sm-6">
              <div class="card <?php if(checkFavorite(1)) {print "favorite";}?>" id="post-1">
                <div class="card-body">
                    <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>
                    <h5 class="card-title">Post #1</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <a class="btn btn-outline-success btn-favorite">Ajouter aux favoris</a>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card <?php if(checkFavorite(2)){print "favorite";}?>" id="post-2">
                <div class="card-body">
                <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>

                    <h5 class="card-title">Post #2</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional      content.</p>
                </div>
                <a class="btn btn-outline-success btn-favorite">Ajouter aux favoris</a>
              </div>
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="assets/js/ajax.js"></script>
</body>
</html>