<?php
include_once "inc/functions.inc.php";



require_once "inc/header.inc.php";
?>


<!-- Contenu principal -->
<main>
  <!-- Conteneur Bootstrap -->
  <div class="container">

    <div class="row">
      <!-- Colonne de gauche pour les filtres -->
      <aside class="col-md-3 aside-filter">

        <hr>

        <h4>CATEGORIES</h4>
        <!-- Conteneur pour les options de filtres -->
        <div class="filter-options">
          <!-- Case à cocher pour l'année 2000 -->
          <label><input type="checkbox" name="annee2000" value="annee2000"> Année 2000</label>
          <!-- Case à cocher pour l'année 2001 -->
          <label><input type="checkbox" name="annee2001" value="annee2001"> Année 2001</label>
          <!-- Case à cocher pour l'année 2002 -->
          <label><input type="checkbox" name="annee2002" value="Violet"> Année 2002</label>
        </div>
      </aside>
      <!-- Colonne de droite pour les produits -->
      <div class="col-md-9">

        <div class="mt-5 pt-5">

          <h1 class=" title mt-5 pt-5 mb-5 pb-5"> DECOUVREZ LES CD DE GWOKA! </h1>
        </div>
        <!-- Conteneur pour les produits -->
        <div class="container">

          <div class="row">

            <div class="col-md-4 mb-4">

              <div class="card">

                <img src="assets/img/CD1.jpg" class="card-img-top" alt="image album cd1">

                <div class="card-body">

                  <h5 class="card-title text-center">Les Tambours Gwoka</h5>

                  <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>

                  <p class="card-text font-weight-bold">15 € </p>
                  <!-- Boutons pour les détails et le panier -->
                  <div class="d-flex justify-content-around">
                    <!-- Bouton pour les détails du produit -->
                    <button class="btn btn-details">Détails</button>
                    <!-- Bouton pour ajouter le produit au panier -->
                    <button class="btn">Panier</button>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-4 mb-4">

              <div class="card">

                <img src="assets/img/CD2.jpg" class="card-img-top" alt="Image album cd2">

                <div class="card-body">

                  <h5 class="card-title text-center">Best of Gwoka</h5>

                  <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>

                  <p class="card-text font-weight-bold">30 € </p>

                  <div class="d-flex justify-content-around">

                    <a href="product_cd.php" class="btn btn-details">Détails</a>

                    <button class="btn">Panier</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin de la ligne Bootstrap -->
        </div>
        <!-- Fin du conteneur pour les produits -->
      </div>

      <!-- Fin du contenu principal -->
</main>
<?php
require_once "inc/footer.inc.php";



?>