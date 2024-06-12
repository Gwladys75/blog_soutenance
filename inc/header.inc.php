<?php

// 1 - Connexion à la BDD via la page functions
require_once "functions.inc.php";

// déconnexion ($_SESSION)
logOut();


// unset($sf2_meta);
// unset($_SESSION); détruit la variable 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $metadescription ?>">
    <meta name="author" content="Gwladys Jacobin">

    <!--lien head librairie AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- lien head bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- lien icone bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Google font HANDLEE, font Rosario-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rosario:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">

    <!--Mon lien css-->
    <link rel="stylesheet" href="<?= RACINE_SITE ?>assets/css/style.css">


    <title><?= $title ?></title>


</head>

<body>

<header>
  <!-- Barre de navigation bootstrap avec menus, sous-menus, inscription, connexion, déconnexion, dashboard, etc. -->

  <nav class="navbar fixed-top navbar-expand-lg navigation w-100">
    <div class="container-fluid">

      <!-- Bouton de toggle pour afficher/masquer le menu sur les écrans petits -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Contenu du menu -->
      <div class="collapse navbar-collapse justify-content-center " id="navbarNavDropdown">
        <div class="logo">
          <!-- Logo du site -->
          <a href="<?= RACINE_SITE?>index.php"> <img src="<?= RACINE_SITE?>assets/img/logo_ka_dans_ka.png" alt="logo ka_dans_ka"></a>
        </div>

        <!-- Liste des éléments de menu -->
        <ul class="navbar-nav">

          <!-- Élément de menu : Histoire du Gwoka -->
          <li class="nav-item">
            <a class="nav-link.underline" aria-current="page" href="<?= RACINE_SITE?>index.php">Histoire du Gwoka</a>
          </li>

          <!-- Élément de menu : Les 7 rythmes -->
          <li class="nav-item">
            <a class="nav-link" href="<?= RACINE_SITE?>les_7_rythmes.php">Les 7 rythmes</a>
          </li>

          <!-- Menu dropdown pour le blog et les articles -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?= RACINE_SITE?>blog.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Blog
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= RACINE_SITE?>blog.php">Histoire du blog</a></li>
            </ul>
          </li>

          <!-- Élément de menu : CD -->
          <li class="nav-item d-flex">
            <a class="nav-link" href="<?= RACINE_SITE?>cd.php">CD</a>
            <i class="bi bi-disc-fill"></i>
          </li>

          <!-- Éléments de menu pour l'administration et le profil utilisateur -->
          <?php if (isset($_SESSION['user'])) {?>
            <?php if ($_SESSION['user']['role'] == 'ROLE_ADMIN') {?>
              <!-- Élément de menu : Backoffice (visible uniquement pour les administrateurs) -->
              <li class="nav-item">
                <a class="nav-link" href="<?= RACINE_SITE?>admin/dashboard.php">Backoffice</a>
              </li>
            <?php }?>
            <!-- Élément de menu : Compte (visible uniquement pour les utilisateurs connectés) -->
            <li class="nav-item">
              <a class="nav-link" href="<?= RACINE_SITE?>profil.php">Compte <sup class="badge rounded-pill text-bg-warning ms-2 fs-6">
                <?= $_SESSION['user']['pseudo']?></sup></a>
            </li>
            <!-- Élément de menu : Déconnexion (visible uniquement pour les utilisateurs connectés) -->
            <li class="nav-item">
              <a href="?action=deconnexion"><i class="bi bi-box-arrow-right"></i></a>
            </li>
          <?php } else {?>
            <!-- Éléments de menu pour l'inscription et la connexion -->
            <a href="<?= RACINE_SITE?>inscription.php"> <i class="bi bi-person-fill-add"></i></a>
            <a href="<?= RACINE_SITE?>connexion.php"> <i class="bi bi-person-square"></i></a>
          <?php }?>
        </ul>
      </div>
    </div>
  </nav>
</header>






                    <!-- ////////////////////////////POUR EVOLUTION DU BLOG/////////////////////////// -->

                    <!-- <a href="<?= RACINE_SITE ?>panier.php"> <i class="bi bi-bag-fill"></i></a> -->



                    <!-- <span class="search-icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <div class="search-bar mt-3">
                        <input type="text" class="form-control show" placeholder="Rechercher...">
                    </div> -->


                </div>
            </div>
        </nav>
    </header>