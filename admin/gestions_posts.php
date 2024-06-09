<?php

require_once '../inc/functions.inc.php';




$info = '';

if (!isset($_SESSION['user'])) {
    header("location:". RACINE_SITE. "connexion.php");
    exit;
}

if ($_SESSION['user']['role'] == 'ROLE_USER') {
    header("location:". RACINE_SITE. "index.php");
   
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'delete' &&!empty($_GET['id'])) {
        $idPost = $_GET['id'];
        deletePost($idPost);
        header("location:". RACINE_SITE. "admin/posts.php");

    } elseif (!empty($_GET['action']) && $_GET['action'] == 'update' &&!empty($_GET['id'])) {
        $idPost = $_GET['id'];
        $post = showPost($idPost);
        header("location:". RACINE_SITE. "admin/posts.php");
    }
}

if (!empty($_POST)) {
    $image = $_FILES['image']['name']?? '';
    $title = htmlentities(trim($_POST['title']))?? '';
    $content = htmlentities(trim($_POST['content']))?? '';
    $author = htmlentities(trim($_POST['author']))?? '';
    $created_at = $_POST['created_at']?? '';

    if (isset($_GET['action']) && $_GET['action'] == 'update' &&!empty($_GET['id'])) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/'. $image);
        updatePost($idPost, $image, $title, $content, $author, $created_at);
        
      
    } else {
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/'. $image);
        addPosts($image, $title, $content, $author, $created_at);
        $info = alert("Vous avez ajouté un article!", "success");
    }
}

require_once '../inc/header.inc.php';
// echo $info;
?>

<!-- Le formulaire d'ajout pour les produits  -->
<main>

  <div class="container ">
    <div class="row justify-content-center mt-5 pt-5 mb-5 pb-5">
      <div class="col-md-8">
        <h2 class="text-center mt-5 pt-5 "><?= isset($post) ? 'Modifier un article' : 'Ajouter un article' ?></h2>
        <?php
        echo $info;
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="mb-3 mt-4 pt-4 text-center">
            <label for="image" class="form-label">Image article</label>
            <?= isset($post['image']) ?  "<strong><span style='color: #FFFFFF;'>ancienne: </span></strong>" . $post['image'] : "" ?>
            <input type="file" class="form-control" id="image" name="image" value="<?= $post['image'] ?? '' ?>">
          </div>
          <div class="mb-3 text-center">
            <label for="created_at" class="form-label">Date de création</label>
            <input type="date" class="form-control" id="created_at" name="created_at" value="<?= $post['created_at'] ?? '' ?>">
          </div>
          <div class="mb-3 text-center">
            <label for="content " class="form-label">Auteur de l'article</label>
            <textarea class="form-control" id="author" placeholder="Entrez le nom de l'auteur de l'article" name="author" value="<?= $post['author'] ?? '' ?>"></textarea>
          </div>
          <div class="mb-3 text-center">
            <label for="title " class="form-label">Titre article</label>
            <input type="text" class="form-control" id="title" placeholder="Entrez le titre de l'article" name="title" value="<?= $post['title'] ?? '' ?>">
          </div>
          <div class="mb-3 text-center">
            <label for="content " class="form-label">Contenu article</label>
            <textarea class="form-control" id="content" rows="10" placeholder="Entrez la description de l'annonce" name="content"><?= $post['content'] ?? '' ?></textarea>
          </div>



          <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn"><?= isset($post) ? 'Modifier' : 'Ajouter' ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<?php
// $success_msg=
require_once "../inc/footer.inc.php";



?>