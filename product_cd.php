<?php
// Inclusion du fichier function
require_once "inc/functions.inc.php";


$title = "product_cd";

// Inclusion du fichier header
require_once "inc/header.inc.php";

?>

<!-- Début de la section de la page -->
<main class="mt-5 pt-5 mb-5 pb-5">
 
  <p class="mt-5 pt-5 mb-5 pb-5"> Produit / CD / Best of Gwoka </p>
  
  <!-- Conteneur -->
  <div class="container">
   
    <div class="row">
      <div class="col-md-6">
        <!-- Image du produit -->
        <img src="assets/img/CD2.jpg" alt="Image CD best of" >
      </div>
      
   
      <div class="col-md-6">
        <!-- Section pour le titre et les détails du produit -->
        <aside class="title-cd">
          <!-- Titre du produit -->
          <h2 class="text-start">Best of Gwoka</h2>
      
          <h3 class="text-white"><strong>30 €</strong></h3>
          <!-- Bouton pour ajouter -->
          <button class="btn">Ajouter au panier</button>
        </aside>
      </div>
    </div>
  </div>
</main>

<?php
// Inclusion du fichier footer
require_once "inc/footer.inc.php";
?>