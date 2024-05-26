<?php
require_once "inc/init.inc.php";







$title = "Blog";
require_once "inc/header.inc.php";
?>


  <main>
<!-- PREMIERE SECTION AVEC TITRE ET PARAGRAPHE -->
    <section class="en-tête m-5 p-5">
      <h1 class="titre mt-5 pt-5">l'Histoire du Blog</h1>
      <div class="brown p-3">
        <p>
        Bienvenue sur mon blog dédié au gwoka, la danse et musique traditionnelle emblématique de la Guadeloupe ! <br>Le gwoka est un véritable trésor culturel qui perpétue les traditions ancestrales de l'île.<br>
        Ses rythmes envoûtants, ses chants puissants et ses mouvements gracieux vous transporteront au cœur de l'histoire et de l'âme guadeloupéenne. <br>
        Que vous soyez un passionné de musique du monde ou simplement curieux de découvrir de nouvelles cultures, vous trouverez ici des informations fascinantes sur l'origine, les instruments, les styles et les principaux artistes du gwoka.<br> Laissez-vous bercer par ces sons uniques et plongez avec moi dans l'univers captivant de cette tradition vivante, fière et authentique de la Guadeloupe !
        </p>
      </div>

    </section>

    <!-- Ajout d'une image et d'un paragraphe avec un bouton -->
    <section class="about">
          <div   class="about-content" data-aos="fade-right">
            <img src="assets/img/artisans_ka.jpg" alt="Image à propos" class="about-img">
            <div class="about-text">
              <h2 class="text-start">Les artisants du KA</h2>
              <p class="text-start">Découvrez les artisants du KA...</p>
              <a href="#" class="btn">En savoir plus</a>
            </div>
          </div>

          <div class="about-content m-5" data-aos="fade-left">
            <img src="assets/img/artisans_ka.jpg" alt="Image à propos" class="about-img">
            <div class="about-text">
              <h2 class="text-start">Les artisants du KA</h2>
              <p class="text-start">Découvrez les artisants du KA...</p>
              <a href="#" class="btn">En savoir plus</a>
            </div>
          </div>
    </section>

    <!-- Contenu existant -->
  </main>

  <!-- FOOTER AVEC LOGO ET LIENS -->
<footer class="container-fluid ">
  <div class="row justify-content-around">
    <div class="col-sm-12 col-md-3">
      <a href="histoire_du_gwo_ka.php"><img src="assets/img/logo (1).png"></a>
    </div>

    <div class="col-sm-12 col-md-3">
      <ul>
      <li><a href="histoire_du_gwo_ka.php">histoire du Gwoka</a></li>
      <li><a href="les_7_rythmes.php">les 7 Rythmes</a></li>
      <li><a href="blog.php">Blog</a></li>
      <li><a href="cd.php">CD</a></li>
      <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>

    <div class="col-sm-12 col-md-3 ">
    <i class="bi bi-facebook"></i>
    <i class="bi bi-instagram"></i>
    <i class="bi bi-github"></i>
    </div>
    
  </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>

</html>