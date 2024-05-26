<?php
require_once "inc/init.inc.php";
connexionBdd();






$title = "les 7 rythmes du Gwoka";
require_once "inc/header.inc.php";
?>


<body>

    <main>
        <div class="en-tete m-5 p-5">
        <h2 class="titre mt-5 pt-5">Les 7 Rythmes du Gwo Ka</h2>
            <p class="brown p-3"> 
            Le Gwoka, danse traditionnelle de la Guadeloupe, est rythmé par sept rythmes distincts qui incarnent l'essence même de cette pratique culturelle emblématique. Chaque rythme porte en lui une histoire, une émotion et une signification profonde, contribuant à la richesse et à la diversité de cette forme artistique unique.
            </p>
        </div>

        <div class="container-gallery flip-container ">
            <div class="PHOTO1 flipper">
                <!-- <audio id="bloc_son" controls="controls" preload="none">
                    <source src="assets/audio/Robe.mp3" type="audio" />
                </audio> -->
               <div class="back">
                    <h1>TOUMBLACK</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore unde est repellat, quidem possimus officia laudantium itaque odit commodi corporis ipsam eligendi</p>
                </div>
            </div>
                <div class="PHOTO2"></div>
                <div class="PHOTO3"></div>
                <div class="PHOTO5"></div>
                <div class="PHOTO6"></div>
                <div class="PHOTO4"></div>
                <div class="PHOTO7"></div>
            </div>

        <!-- <section class="container">
        <div class="flip-container">
            <div class="flipper">
                <div clas="front">
                 <img src="assets/img/1rythme.jpg">
        
                </div>
                <div class="back">
                    <h1>TOUMBLACK</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore unde est repellat, quidem possimus officia laudantium itaque odit commodi corporis ipsam eligendi</p>
                </div>
        
            </div>
        </div>
    </section> -->



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