<?php


require_once "../inc/functions.inc.php";

if( !isset($_SESSION['user'])){
    header("location:".RACINE_SITE."inscription.php");
}else{
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header("location:".RACINE_SITE."histoire_du_gwo_ka.php");
    }
}








$title = "posts";
require_once "../inc/header.inc.php";

?>

<main>

    <div class="d-flex flex-column m-auto mt-5">

        <h2 class="text-center fw-bolder mb-5 text-danger">Les articles</h2>
        <a href="gestions_posts.php" class="btn btn-primary p-3 fs-3 align-self-end "> Ajouter articles</a>
        <table class="table table-dark table-bordered mt-5 ">
            <thead>
                <tr>
                   
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

        $posts = allPosts();

                foreach ($posts as $post) {

                   

                ?>

                    <tr>

                        <!-- Je récupére les valeus de mon tableau $ post dans des td -->
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['title'] ?></td>
                        <td> <img src="<?= RACINE_SITE . "assets/img/" . $post['image'] ?>" alt="image article" class="img-fluid upload-img"></td>
                        <td><?= $post['author'] ?> </td>
                        <td><?= substr($post['content'], 0, 200) ?>...</td>
                        <td><?= $post['created_at'] ?></td>
                        <td class="text-center">
                            <a href="gestions_posts.php?action=delete&id=<?= $post['id'] ?>">
                                <i class="bi bi-trash3-fill text-danger"></i>
                            </a>
                        </td>
                        <td class="text-center">
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


