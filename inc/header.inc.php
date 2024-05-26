<?php

// 1 - Connexion à la BDD via la page init.inc.php

require_once 'inc/init.inc.php';
require_once 'inc/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- lien head bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- lien icone bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Google font HANDLEE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= RACINE_SITE ?>assets/css/style.css">

    <title><?= $title ?></title>
</head>



<body>

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navigation w-100">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center " id="navbarNavDropdown">
                    <div class="logo">
                        <a href="histoire_du_gwo_ka.php"> <img src="assets/img/logo_ka_dans_ka.png" alt="logo"></a>
                    </div>

                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link .underline" aria-current="page" href="histoire_du_gwo_ka.php">Histoire du Gwoka</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="les_7_rythmes.php">les 7 rythmes</a>
                        </li>
                        <!-- MENU DROPDOWN -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="blog.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Blog
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="blog.php">Histoire du blog</a></li>
                                <li><a class="dropdown-item" href="#">Les artisants du Ka</a></li>
                                <li><a class="dropdown-item" href="#">Les grands Noms du Gwoka</a></li>
                                <li><a class="dropdown-item" href="#">Artistes du Gwoka </a></li>
                                <li><a class="dropdown-item" href="ajout_posts.php">Ajouter des articles</a></li>
                            </ul>
                        </li>

                        <li class="nav-item d-flex">
                            <a class="nav-link" href="cd.php">CD</a>
                            <i class="bi bi-disc-fill"></i>
                        </li>

                        <?php if ($_SESSION['user']['role'] == 'ROLE_ADMIN') { ?>
                                        <!--  -->
                                        <li class="nav-item">
                                             <a class="nav-link" href="<?= RACINE_SITE ?>admin/dashboard.php?dashboard_php">Backoffice</a>
                                        </li>

                                   <?php } ?>

                    </ul>
                    <a href="inscription.php"> <i class="bi bi-person-square"></i></a>
                    <i class="bi bi-bag-fill"></i>
                    <i class="bi bi-search"></i>


                </div>
            </div>
        </nav>
    </header>