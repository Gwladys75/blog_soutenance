<?php

require_once "../inc/functions.inc.php";






if (isset($_GET['action']) && isset($_GET['id'])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id'])) {
        $idUser = htmlentities($_GET['id']);

        deleteUser($idUser);
    }
}

if (!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id'])) {
    $user = showUser($_GET['id']);
    if ($user['role'] == 'ROLE_ADMIN') {
        updateRole('ROLE_USER', $user['id']);
    }

    if ($user['role'] == 'ROLE_USER') {
        updateRole('ROLE_ADMIN', $user['id']);
    }
}


if (!isset($_SESSION['user'])) {
    header("location:" . RACINE_SITE . "connexion.php");
} else {
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        header("location:" . RACINE_SITE . "histoire_du_gwo_ka.php");
    }
}







$title = "Backoffice";

require_once "../inc/header.inc.php";



?>

<main>
    <div class="container mt-5 pt-5 ">
        <div class="row justify-content-center mt-5 mb-5 pt-5 pb-5">
            <div class="col-12 text-center">
                <?php
                if (isset($_GET['dashboard_php'])) :
                ?>
                    <h2 class="">Bonjour <?= $_SESSION['user'] ?></h2>

                <?php
                endif;
                ?>

                <p class="title">Bienvenue sur le backoffice</p>
           
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-12 justify-center ">
                <div class=" text-bg p-3 mt-5 mb-5">
                    <hr>

                    <ul class="nav  ">
                        <li>
                            <a href="<?= RACINE_SITE ?>admin/dashboard.php" class="nav-link text-light">Backoffice</a>
                        </li>
                        <li>
                            <a href="<?= RACINE_SITE ?>admin/posts.php" class="nav-link text-light">Articles</a>
                        </li>
                        <li>
                            <a href="<?= RACINE_SITE ?>admin/cd.php" class="nav-link text-light">CD</a>
                        </li>
                        <li>
                            <a href="<?= RACINE_SITE ?>admin/users.php" class="nav-link text-light">Utilisateurs</a>
                        </li>

                    </ul>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (!empty($_GET)) {
                    if (isset($_GET['posts.php'])) {
                        require_once "posts.php";
                    } else if (isset($_GET['users.php'])) {
                        require_once "users.php";
                    } else {
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