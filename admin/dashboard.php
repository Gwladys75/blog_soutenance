<?php

require_once "../inc/functions.inc.php";



// Vérification si une action est demandée (suppression ou mise à jour d'un utilisateur)
if (isset($_GET['action']) && isset($_GET['id'])) {
    // Vérification si l'action demandée est la suppression d'un utilisateur
    if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id'])) {
        // Récupération de l'ID de l'utilisateur à supprimer
        $idUser = htmlentities($_GET['id']);
        // Suppression de l'utilisateur
        deleteUser($idUser);
        // Redirection vers la page des utilisateurs (commentée pour le moment)
        // header("location:" . RACINE_SITE . "admin/users.php");
    }
}

// Vérification si une mise à jour d'un utilisateur est demandée
if (!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id'])) {
    // Récupération des informations de l'utilisateur à mettre à jour
    $user = showUser($_GET['id']);
    // Vérification si l'utilisateur est administrateur
    if ($user['role'] == 'ROLE_ADMIN') {
        // Mise à jour du rôle de l'utilisateur en utilisateur simple
        updateRole('ROLE_USER', $user['id']);
        // Redirection vers la page des utilisateurs
        header("location:" . RACINE_SITE . "admin/users.php");
    }
    // Vérification si l'utilisateur est utilisateur simple
    if ($user['role'] == 'ROLE_USER') {
        // Mise à jour du rôle de l'utilisateur en administrateur
        updateRole('ROLE_ADMIN', $user['id']);
        // Redirection vers la page des utilisateurs
        header("location:" . RACINE_SITE . "admin/users.php");
    }
}

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("location:" . RACINE_SITE . "connexion.php");
} else {
    // Vérification si l'utilisateur est utilisateur simple
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        // Redirection vers la page d'accueil si l'utilisateur est utilisateur simple
        header("location:" . RACINE_SITE . "index.php");
    }
}


$title = "Backoffice";


require_once "../inc/header.inc.php";


?>

<!-- Début de la section principale de la page -->
<main>
    <!-- Conteneur principal -->
    <div class="container mt-5 pt-5 ">
      
        <div class="row justify-content-center mt-5 mb-5 pt-5 pb-5">
       
            <div class="col-12 text-center">
                <?php
                // Vérification si le paramètre dashboard_php est présent dans l'URL
                if (isset($_GET['dashboard_php'])) :
               ?>
                
                <div class=" mt-5 mb-5 pt-5 mb-5 w-50 m-auto">
                    <h2>Bonjour <?= $_SESSION['user']['pseudo']?></h2>
                </div>
                <?php
                endif;
               ?>
            </div>
        </div>
        
       
        <div class="row d-flex justify-content-center  mt-5 mb-5">
          
            <div class="col-12 col-md-6 ">
                <div class=" text-bg p-3  ">
                    
                    <hr>
                    <!-- Menu de navigation -->
                    <ul class="nav">
                        <li>
                            <!-- Lien vers la page des articles -->
                            <a href="<?= RACINE_SITE?>admin/posts.php" class="nav-link  text-light">Articles</a>
                        </li>
                        <li>
                            <!-- Lien vers la page des utilisateurs -->
                            <a href="<?= RACINE_SITE?>admin/users.php" class="nav-link text-light">Utilisateurs</a>
                        </li>
                    </ul>
                    
                    <hr>
                </div>
            </div>
        </div>
       
        <div class="row justify-content-center">
            
            <div class="col-md-6">
                <?php
                // Vérification si des paramètres sont présents dans l'URL
                if (!empty($_GET)) {
                    // Vérification si le paramètre posts.php est présent dans l'URL
                    if (isset($_GET['posts.php'])) {
                        // Inclusion de la page des articles
                        require_once "posts.php";
                    } 
                    // Vérification si le paramètre users.php est présent dans l'URL
                    else if (isset($_GET['users.php'])) {
                        // Inclusion de la page des utilisateurs
                        require_once "users.php";
                    } 
                    // Sinon, inclusion de la page par défaut (dashboard.php)
                    else {
                        require_once "dashboard.php";
                    }
                }
               ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once "../inc/footer.inc.php";


?>