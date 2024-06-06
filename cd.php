<?php
include_once "inc/functions.inc.php";







require_once "inc/header.inc.php";
    ?>


<main>
  <div class="container">
    <div class="row">
      <aside class="col-md-3 aside-filter">
        <hr>
        <h4>CATEGORIES</h4>
        <div class="filter-options">
          <label><input type="checkbox" name="annee2000" value="annee2000"> Année 2000</label>
          <label><input type="checkbox" name="annee2001" value="annee2001"> Année 2001</label>
          <label><input type="checkbox" name="annee2002" value="Violet"> Année 2002</label>
        </div>
      </aside>
      <div class="col-md-9">
        <div class="mt-5 pt-5">
          <h2 class="text-center cd"> DECOUVREZ LES CD DE GWOKA ! </h2>
        </div>
        <div class="container">
          <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="assets/img/CD1.jpg"class="card-img-top" alt="Produit 1">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Les Tambours Gwoka</h5>
                                    <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                    <p class="card-text font-weight-bold">15 € </p>
                                    <div class="d-flex justify-content-around">
                                    <button class="btn btn-details">Détails</button>
                                    <button class="btn">Panier</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                      
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="assets/img/CD2.jpg"class="card-img-top" alt="Produit 1">
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
        </div>

         


</main>

<?php
require_once "inc/footer.inc.php";



?>





