<?php


require_once "../inc/functions.inc.php";

// Vérification si l'utilisateur est connecté
if( !isset($_SESSION['user'])){
    // Si non, redirection vers la page d'inscription
    header("location:".RACINE_SITE."inscription.php");
}else{
    // Si oui, vérification du rôle de l'utilisateur
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        // Si c'est un utilisateur normal, redirection vers la page d'accueil
        header("location:".RACINE_SITE."index.php");
    }
}


$title = "posts";


require_once "../inc/header.inc.php";

?>

<!-- Contenu principal de la page -->
<main>

    <!-- Conteneur principal -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">

      
        <h1 class=" title text-center mt-5 mb-5 pt-5 pb-5">TOUS LES ARTICLES DU BLOG</h1>

        <!-- Lien pour ajouter un article -->
        <a href="gestions_posts.php" class="btn btn-primary p-3 fs-3 mb-3">Ajouter articles</a>

        <!-- Tableau des articles -->
        <table class="table table-dark table-bordered mt-3 text-center">
            <thead>
                <tr>
                    <!-- En-tête du tableau -->
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Image article</th>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Supprimer</th>
                    <th> Modifier</th>
                </tr>
            </thead>
            <tbody>

            <?php

            // Récupération de la liste des articles
            $posts = allPosts();

            // Boucle sur chaque article
            foreach ($posts as $post) {

            ?>

                <tr>

                    <!-- Affichage des informations de l'article -->
                    <td><?= $post['id'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td> 
                        <!-- Affichage de l'image de l'article -->
                        <img src="<?= RACINE_SITE . "assets/img/" . $post['image'] ?>" alt="image article" class="img-fluid upload-img">
                    </td>
                    <td><?= $post['author'] ?> </td>
                    <td><?= substr($post['content'], 0, 200) ?>...</td>
                    <td><?= $post['created_at'] ?></td>
                    <td class="text-center">
                        <!-- Lien pour supprimer l'article -->
                        <a href="gestions_posts.php?action=delete&id=<?= $post['id'] ?>">
                            <i class="bi bi-trash3-fill text-danger"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <!-- Lien pour modifier l'article -->
                        <a href="gestions_posts.php?action=update&id=<?= $post['id'] ?>">
                            <i class="bi bi-pen-fill"></i>
                        </a>
                    </td>

                </tr>

            <?php
            }

            ?>


            </tbody>

        </table>

    </div>

</main>

<?php

require_once "../inc/footer.inc.php";
?>