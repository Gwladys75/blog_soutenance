<?php


require_once "../inc/functions.inc.php";


$title = "Utilisateurs";


require_once "../inc/header.inc.php";


?>

<!-- Conteneur principal -->
<div class="d-flex flex-column m-5  table-responsive">

    <!-- Titre de la page -->
    <h2 class="title mt-5 mb-5 pt-5 mb-5">LISTE DES UTILISATEURS</h2>

    <!-- Tableau des utilisateurs -->
    <table class="table table-dark table-bordered mt-5">
        <thead>
            <tr>
                <!-- En-tête du tableau -->
                <th>ID</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>

        <?php

        // Récupération de la liste des utilisateurs
        $users = allUsers();

        // Boucle sur chaque utilisateur
        foreach($users as $user){

            // Début d'une ligne du tableau
           ?>

            <tr>
                <!-- Affichage des informations de l'utilisateur -->
                <td><?=$user['id']?></td>
                <td><?=$user['pseudo']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['role']?></td>
                <td class="text-center">
                    <!-- Lien pour supprimer l'utilisateur -->
                    <a href="dashboard.php?users_php&action=delete&id=<?= $user['id']?>"><i class="bi bi-trash3-fill text-danger"></i></a>
                   
                </td>
                <td class="text-center">
                    <!-- Lien pour modifier le rôle de l'utilisateur -->
                    <a href="dashboard.php?users_php&action=update&id=<?= $user['id']?>" class="btn btn-danger">
                        <?=($user['role']) == 'ROLE_ADMIN'? 'Rôle user' : 'Rôle admin'?>
                 
                </td>
            </tr>

        <?php
        }
       ?>

        </tbody>

    </table>

</div>

<?php

require_once "../inc/footer.inc.php";
?>