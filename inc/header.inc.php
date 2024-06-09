<?php

// 1 - Connexion à la BDD via la page function
require_once "functions.inc.php";

// déconnexion ($_SESSION)
logOut();
// unset($sf2_meta);
// unset($_SESSION);
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
        <!-- Barre de navigation bootstrap menus, sous menu, inscription, dashboard, panier -->

        <nav class="navbar fixed-top navbar-expand-lg navigation w-100">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center " id="navbarNavDropdown">
                    <div class="logo">
                        <a href="<?= RACINE_SITE ?>index.php"> <img src="<?= RACINE_SITE ?>assets/img/logo_ka_dans_ka.png" alt="logo"></a>
                    </div>

                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link .underline" aria-current="page" href="<?= RACINE_SITE ?>index.php">Histoire du Gwoka</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= RACINE_SITE ?>les_7_rythmes.php">Les 7 rythmes</a>
                        </li>
                        <!-- MENU DROPDOWN pour le blog et articles -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?= RACINE_SITE ?>blog.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Blog
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= RACINE_SITE ?>blog.php">Histoire du blog</a></li>
                            </ul>
                        </li>
                        <li class="nav-item d-flex">
                            <a class="nav-link" href="<?= RACINE_SITE ?>cd.php">CD</a>
                            <i class="bi bi-disc-fill"></i>
                        </li>




                        <!-- BackOffice -->
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'ROLE_ADMIN') { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= RACINE_SITE ?>dashboard.php">Backoffice</a>
                            </li>

                            <li class="nav-item">
                                <a href="index.php?action=deconnexion"><i class="bi bi-box-arrow-right"></i></a>

                            </li>
                            <li>
                                <a class="nav-link" href="<?= RACINE_SITE ?>profil.php">Compte <sup class="badge rounded-pill text-bg-danger ms-2 fs-6"><?= $_SESSION['user']['pseudo'] ?></sup></a>
                            </li>


                            <?php } ?>
                    </ul>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <!-- Icones -->
                        <a href="<?= RACINE_SITE ?>inscription.php"> <i class="bi bi-person-fill-add"></i></a>
                        <a href="<?= RACINE_SITE ?>connexion.php"> <i class=" bi bi-person-square"></i></a>


                    <?php }


                    ?>



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