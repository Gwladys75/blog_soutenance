<?php

// Inclusion du fichier de fonctions
require_once "inc/functions.inc.php";

// Vérification si l'utilisateur est connecté
if (empty($_SESSION['user'])) {
    // Si non, redirection vers la page de connexion
    header("location:".RACINE_SITE."connexion.php");
} else if ( $_SESSION['user']['role'] == 'ROLE_ADMIN') {
  
    
}



$title = "Profil";

// Inclusion du header
require_once "inc/header.inc.php";
?>

<!-- Début du container principal -->
<main class="container mt-5 mb-5 pt-5 pb-5 text-center">
    <!-- Titre de la page -->
    <h1 class=" title title-profil mt-5 pt-5"> PROFIL UTILISATEUR</h1>
    <!-- Section contenant les informations du profil -->
    <section class="row mt-5 mb-5 pt-5 pb-5 justify-content-center">
        <div class="col-md-8">
            <img src="assets/img/djembe.png" alt="Image de profil" class="img-fluid img-djembe rounded mb-3 mx-auto d-block">
            <!-- Carte contenant les informations du profil -->
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title para-brown ">
                        <?= $_SESSION['user']['pseudo'] ?>
                    </h5>
                </div>
                <div class="card-body ">
                    <!-- Informations du profil -->
                    <p class="card-text para-brown">Email : <?= $_SESSION['user']['email'] ?></p>
                    <p class="card-text para-brown">Pseudo : <?= $_SESSION['user']['pseudo'] ?></p>
                </div>
                <div class="card-footer text-muted">
                    <!-- Bouton de déconnexion -->
                    <a href="profil.php?action=deconnexion" class="btn">Me déconnecter</a>
                    <!-- Bouton de modification du profil -->
                    <!-- <a href="" class="btn">Modifier mon profil</a> -->
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Inclusion du footer -->
<?php
require_once "inc/footer.inc.php";
?>