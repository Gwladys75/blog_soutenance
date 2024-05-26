<?php

require_once 'inc/functions.inc.php';


// je  vérifie d'abord si le $_POST (mon tableau) = le formulaire a été soumis 

$info='';

if (!empty($_POST)) {

  // affiche le contenu de mon tableau si il a bien été soumis 

  $image = $_FILES['image']['name'] ?? '';
  $title = htmlentities(trim($_POST['title'])) ?? '';
  $content = htmlentities(trim($_POST['content'])) ?? ''; 
 

  // Déplace mon fichier téléchargé vers mon répertoire
  move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/' . $image);


  header("location:" . RACINE_SITE . "blog.php");


 
  addPosts($image, $title, $content);
  $info= alert("Vous avez un l'article !", "success");


}




require_once 'inc/header.inc.php';
// echo $info;
?>

<!-- Le formulaire d'ajout pour les produits  -->
<main>
<div class="container ">
    <div class="row justify-content-center mt-5 pt-5 mb-5 pb-5">
      <div class="col-md-8">
        <h2 class="text-center mt-5 pt-5 ">AJOUTER UNE ANNONCE</h2>

        <form action="#" method="post" enctype="multipart/form-data">
          <div class="mb-3 mt-4 pt-4 text-center">
            <label for="image" class="form-label">Image article</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          <div class="mb-3 text-center">
            <label for="title " class="form-label">Titre article</label>
            <input type="text" class="form-control" id="title" placeholder="Entrez le titre de l'article" name="title">
     </div>
          <div class="mb-3 text-center">
            <label for="content " class="form-label">Contenu article</label>
            <textarea class="form-control" id="content" rows="10" placeholder="Entrez la description de l'annonce" name="content"></textarea>
          </div>
         
          <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn-form">Ajouter article</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</main>

<?php
// $success_msg=
require_once "inc/footer.inc.php";



?>