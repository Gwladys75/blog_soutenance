<footer>
  <!-- Conteneur du pied de page -->
  <div class="footer-container pb-1">
    <!-- Logo du site dans le pied de page -->
    <img src="<?= RACINE_SITE ?>assets/img/logo_ka_dans_ka.png" alt="Logo_ka_dans_ka" class="logo-footer">

    <!-- Partie gauche du pied de page -->
    <div class="footer-left">
      <ul>
        <!-- Liens vers les différentes pages du site -->
        <li class="social"><a href="<?= RACINE_SITE ?>index.php">Histoire du Gwoka</a></li>
        <li class="social"><a href="<?= RACINE_SITE ?>les_7_rythmes.php">Les 7 Rythmes</a></li>
        <li class="social"><a href="<?= RACINE_SITE ?>blog.php">Blog</a></li>
        <li class="social"><a href="<?= RACINE_SITE ?>cd.php">CD</a></li>
      </ul>
    </div>

    <!-- Partie droite du pied de page -->
    <div class="footer-right">
     
      <h4 class="social">Suivez-moi</h4>
      <!-- Icônes des réseaux sociaux -->
      <div class="icones-reseaux">
        <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
        <a href="https://github.com" target="_blank" rel="noopener noreferrer"><i class="bi bi-github"></i></a>
      </div>

      <!-- Informations de copyright -->
      <h4 class="social"><i class="bi bi-c-circle"></i> 2024 - Ka Dans Ka - Aux rythmes du ka</h4>
    </div>
  </div>
</footer>

<!-- Inclusion des fichiers JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Initialisation de la bibliothèque AOS
  AOS.init();
</script>

<!-- Inclusion de mon fichier JavaScript-->
<script src="<?= RACINE_SITE ?>assets/js/script.js"></script>

<!-- Fin du body et du HTML -->
</body>
</html>