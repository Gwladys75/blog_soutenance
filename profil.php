<?php


require_once "inc/functions.inc.php";



if (empty($_SESSION['user'])) {

    header("location:".RACINE_SITE."connexion.php");
   

} else if ( $_SESSION['user']['role'] == 'ROLE_ADMIN') {

    // header("location:".RACINE_SITE."admin/dashboard.php?dashboard_php");


    } 


$title = "Profil";
require_once "inc/header.inc.php";
?>



<main class="container mt-5 mb-5 pt-5 pb-5 text-center">
    <h1 class="title-profil mt-5 pt-5">BIENVENUE SUR VOTRE PROFIL UTILISATEUR</h1>
    <section class="row mt-5 mb-5 pt-5 pb-5 justify-content-center">
        <div class="col-md-8">
            <img src="assets/img/julien.png" alt="Image de profil" class="img-fluid rounded-circle mb-3 mx-auto d-block">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title para-brown ">
                        <?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?>
                    </h5>
                </div>
                <div class="card-body ">
                    <p class="card-text para-brown">Email : <?= $_SESSION['user']['email'] ?></p>
                    <p class="card-text para-brown">Pseudo : <?= $_SESSION['user']['pseudo'] ?></p>
                </div>
                <div class="card-footer text-muted">
                    <a href="profil.php?action=deconnexion" class="btn">Me déconnecter</a>
                    <a href="" class="btn">Modifier mon profil</a>
                </div>
            </div>
        </div>
    </section>
</main>







<?php
require_once "inc/footer.inc.php";

?>