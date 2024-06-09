<?php
require_once "inc/functions.inc.php";

$articles = allPosts();

$title = "Blog";
require_once "inc/header.inc.php";
?>

<main>
  <section class="en-tête m-5 p-5">
    <h1 class="title mt-5 pt-5">Découvrez les derniers articles</h1>
    <div class="para-light p-3">
      <p class="">
        Que vous soyez un passionné de musique du monde ou simplement curieux de découvrir de nouvelles cultures, vous trouverez ici des informations fascinantes sur l'origine, les instruments, les styles et les principaux artistes du gwoka.
      </p>
    </div>
  </section>

  <section>
    <div class="container ">
      <div class="row g-3">

        <?php
        foreach ($articles as $article)
         { ?>

          <div class="col-md-4 mb-5 pb-5">
            <div class="card" data-aos="zoom-out-up">
              <img src="<?= RACINE_SITE . "assets/img/" . $article['image'] ?>" class="card-img-top" alt="Image 1">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="card-text text-start para-brown"><strong><?= ucfirst($article['author']) ?></strong></p>
                  <p class="card-text text-start para-brown"><strong><?= $article['created_at'] ?></strong></p>
                </div>
                <h5 class="card-title text-center para-brown"><?= strtoupper($article['title']) ?></h5>
                <p class="card-text text-start para-brown"><?= substr($article['content'], 0, 100) . '...' ?></p>
                <a href="<?= htmlspecialchars("article.php?id=" . $article['id']); ?>" class="btn">En savoir plus...</a>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
</main>

<?php require_once "inc/footer.inc.php"; ?>