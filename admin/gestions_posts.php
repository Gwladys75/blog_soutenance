<?php

require_once '../inc/functions.inc.php';


// Initialisation d'une variable pour stocker des informations
$info = '';

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("location:". RACINE_SITE. "connexion.php");
    exit;
}

// Vérification du rôle de l'utilisateur
if ($_SESSION['user']['role'] == 'ROLE_USER') {
    // Redirection vers la page d'accueil si l'utilisateur est un utilisateur normal
    header("location:". RACINE_SITE. "index.php");
}

// Vérification si des actions sont demandées (suppression ou mise à jour d'un article)
if (isset($_GET['action']) && isset($_GET['id'])) {
    // Vérification si l'action demandée est la suppression d'un article
    if (!empty($_GET['action']) && $_GET['action'] == 'delete' &&!empty($_GET['id'])) {
        // Récupération de l'ID de l'article à supprimer
        $idPost = $_GET['id'];
        // Suppression de l'article
        deletePost($idPost);
        // Redirection vers la page des articles
        header("location:". RACINE_SITE. "admin/posts.php");
    } elseif (!empty($_GET['action']) && $_GET['action'] == 'update' &&!empty($_GET['id'])) {
        // Récupération de l'ID de l'article à mettre à jour
        $idPost = $_GET['id'];
        // Récupération des informations de l'article à mettre à jour
        $post = showPost($idPost);
    }
}

// Vérification si des données ont été envoyées par le formulaire
if (!empty($_POST)) {
    // Récupération des données du formulaire
    $image = $_FILES['image']['name']?? '';
    $title = htmlentities(trim($_POST['title']))?? '';
    $content = htmlentities(trim($_POST['content']))?? '';
    $author = htmlentities(trim($_POST['author']))?? '';
    $created_at = $_POST['created_at']?? '';

    // Vérification si l'action demandée est la mise à jour d'un article
    if (isset($_GET['action']) && $_GET['action'] == 'update' &&!empty($_GET['id'])) {
        // Déplacement de l'image uploadée
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/'. $image);
        // Mise à jour de l'article
        updatePost($idPost, $image, $title, $content, $author, $created_at);
        // Affichage d'un message de succès
        $info = alert("Vous avez modifier un article!", "success");
    } else {
        // Déplacement de l'image uploadée
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/'. $image);
        // Ajout d'un nouvel article
        addPosts($image, $title, $content, $author, $created_at);
        // Affichage d'un message de succès
        $info = alert("Vous avez ajouté un article!", "success");
    }
}


require_once '../inc/header.inc.php';
// echo $info;

?>

<!-- Le formulaire  -->
<main>

  <!-- Conteneur principal -->
  <div class="container ">
    <
    <div class="row justify-content-center mt-5 pt-5 mb-5 pb-5">
      <!-- Colonne pour le formulaire -->
      <div class="col-md-8">
        <!-- Titre du formulaire -->
        <h2 class="text-center mt-5 pt-5 "><?= isset($post)? 'Modifier un article' : 'Ajouter un article'?></h2>
        
        <!-- Affichage des messages d'information -->
        <?php
        echo $info;
       ?>
        
        <!-- Formulaire d'ajout/modification d'article -->
        <form action="#" method="post" enctype="multipart/form-data">
          <!-- Champ pour l'image de l'article -->
          <div class="mb-3 mt-4 pt-4 text-center text-white">
            <label for="image" class="form-label">Image article</label>
            <?= isset($post['image'])?  "<strong><span style='color: #FFFFFF;'>ancienne: </span></strong>". $post['image'] : ""?>
            <input type="file" class="form-control" id="image" name="image" value="<?= $post['image']?? ''?>">
          </div>
          
          <!-- Champ pour la date de création de l'article -->
          <div class="mb-3 text-center">
            <label for="created_at" class="form-label">Date de création</label>
            <input type="date" class="form-control" id="created_at" name="created_at" value="<?= $post['created_at']?? ''?>">
          </div>
          
          <!-- Champ pour l'auteur de l'article -->
          <div class="mb-3 text-center">
            <label for="author" class="form-label">Auteur de l'article</label>
            <input class="form-control" id="author" placeholder="Entrez le nom de l'auteur de l'article" name="author" value="<?= $post['author']?? ''?>">
          </div>
          
          <!-- Champ pour le titre de l'article -->
          <div class="mb-3 text-center">
            <label for="title " class="form-label">Titre article</label>
            <input type="text" class="form-control" id="title" placeholder="Entrez le titre de l'article" name="title" value="<?= $post['title']?? ''?>">
          </div>
          
          <!-- Champ pour le contenu de l'article -->
          <div class="mb-3 text-center">
            <label for="content " class="form-label">Contenu article</label>
            <textarea class="form-control" id="content" rows="10" placeholder="Entrez la description de l'annonce" name="content"><?= $post['content']?? ''?></textarea>
          </div>

          <!-- Bouton de soumission du formulaire -->
          <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn"><?= isset($post)? 'Modifier' : 'Ajouter'?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<?php

require_once "../inc/footer.inc.php";


?>