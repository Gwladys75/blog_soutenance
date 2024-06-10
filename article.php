<?php
require_once "inc/functions.inc.php";

// Vérification de la présence de paramètres GET et de l'existence de l'identifiant de l'article
if (isset($_GET) && !empty($_GET)) {
  if (isset($_GET['id'])) {
    // Récupération de l'article via la fonction showPost() en utilisant l'identifiant de l'article
    $post = showPost($_GET['id']);
  }
}


$title = "Article";


require_once "inc/header.inc.php";
?>

<!-- Début de la section principale de la page -->
<main>

  <!-- Début de la section contenant l'article -->
  <div class="container mt-5 pt-5">
    <div class="row mt-5 pt-5 mb-5 pb-5">

      
      <div class="col-sm-12">
        <h1 class="article-title"><?= ucfirst($post['title']) ?></h1>
      </div>
      <div class="d-flex justify-content-around">
        <p><?= ucfirst($post['author']) ?></p>
        <p><?= date('d M Y', strtotime($post['created_at'])) ?></p>
      </div>
    </div>

    <div class="row ">
      <div class="col-sm-12">
        <img src="<?= RACINE_SITE . "assets/img/" . $post['image'] ?>" alt="Image de l'article" class="article-image" width="800">
      </div>
    </div>

    <div class="row mb-5 pb-5">
      <div class="col-sm-12 para-center article-content">
        <p class="para-brown" style="text-align: justify;"><?= $post['content'] ?></p>
      </div>
    </div>
  </div>
</main>


<!-- // EVOLUTION DU BLOG // -->

    <!-- <div class="container-comment mt-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="mt-3 pt-3">
            <h2>Laisser un commentaire</h2>
            <div class="comment-section mt-3 pt-3">
              <div class="mb-3 form-label text-center">
                <label for="pseudoInput">Pseudo</label>
                <input type="text" class="form-control" id="pseudoInput" name="pseudo" placeholder="Entrez votre pseudo">
              </div>
              <div class="mb-3 form-label text-center">
                <label for="commentInput">Commentaire</label>
                <textarea class="form-control" id="commentInput" name="comment" rows="3" placeholder="Entrez votre commentaire"></textarea>
              </div>
              <div class="text-center mt-3 pt-3 mb-5 pb-5">
                <button type="submit" name="submit" class="btn">Envoyer le commentaire</button>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div> -->


  </div>



</main>

<?php
require_once "inc/footer.inc.php";
?>