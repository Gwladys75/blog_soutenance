<?php

// 1 - Connexion à la BDD via la page init.inc.php
require_once 'inc/functions.inc.php';
require_once 'inc/init.inc.php';





if (!empty($_SESSION['user'])) {

  // header("location:" . RACINE_SITE . "");
}

echo "<br><br><br><br><br>";



$info = '';

if (!empty($_POST)) // l'envoi du Formulaire (button "S'inscrire" ) 
{
  // debug($_POST);

  $verif = true;

  foreach ($_POST as $value) {


    if (empty($value)) {

      $verif = false;
    }
  }

  if (!$verif) {
    debug($_POST);


    $info = alert("Veuillez renseigner tout les champs", "danger");
  } else {

    debug($_POST);

    // On stock les values de nos champs dans des variables et en les passant dans la fonction trim()



    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;
    $confirmMdp = isset($_POST['confirmMdp']) ? $_POST['confirmMdp'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;




    if (strlen($first_name) < 2 || preg_match('/[0-9]+/', $first_name)) {

      $info = alert("Le prénom n'est pas valide.", "danger");
    }

    if (strlen($last_name) < 2 || preg_match('/[0-9]+/', $last_name)) {

      $info .= alert("Le nom n'est pas valide.", "danger");
    }

    if (strlen($pseudo) < 2) {

      $info .= alert("Le pseudo n'est pas valide.", "danger");
    }

    if (strlen($mdp) < 5 || strlen($mdp) > 15) {

      $info .= alert("Le mot de passe n'est pas valide.", "danger");
    }
    if ($mdp !== $confirmMdp) {

      $info .= alert("Le mot de passe et la confirmation doivent être identique.", "danger");
    }


    if (strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $info .= alert("L'email n'est pas valide.", "danger");
    }

    if (!preg_match('#^[0-9]+$#', $phone) || strlen($phone) > 10 || !trim($phone)) {

      $info .= alert("Le Téléphone n'est pas valide.", "danger");
    }



    if (empty($info)) {

      $emailExist = checkEmailUser($email);
      $pseudoExist = checkPseudoUser($pseudo);


      if ($emailExist || $pseudoExist) {

        $info = alert("Vous avez déjà un compte", "danger");
        // ***************** REDIRECTION "authentification.php"



      } else if ($mdp !== $confirmMdp) {

        $info .= alert("Le mot de passe et la confirmation doivent être identiques.", "danger");
      } else {

        $mdp = password_hash($mdp, PASSWORD_DEFAULT);

        inscriptionUsers($first_name, $last_name, $pseudo, $email, $mdp, $phone);

        $info = alert('Vous êtes bien inscrit, vous pouvez vous connectez !', 'success');
      }
    }
  }
} else {
  debug($_POST);
  echo 'Non SUBMIT';
}



require_once 'inc/header.inc.php';
?>



<main>


  <section class="inscript">
    <div>
      <h4>Rejoignez notre communauté de passionnés de Gwoka !</h4>
      <p> Inscrivez-vous dès maintenant pour profiter de toutes les fonctionnalités de notre blog et découvrir les dernières actualités sur cet art traditionnel guadeloupéen.</p>
    </div>
  </section>

  <section class="formu">

    <form action="connexion.php" method="post" id="inscription" class="mt-5 w-50">

      <div class="mb-3 text-center">
        <label for="prenom" class="form-label">Votre prénom</label>
        <input type="text" class="form-control" id="prenom" placeholder="Votre prenom" name="first_name" required>
      </div>

      <div class="mb-3 text-center">
        <label for="nom" class="form-label">Votre nom</label>
        <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="last_name" required>
      </div>


      <div class="mb-3 text-center">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" id="email" placeholder="Votre email" name="email" required>
      </div>


      <div class="mb-3 text-center">
        <label for="username" class="form-label">Votre pseudo</label>
        <input type="text" class="form-control" id="username" placeholder="Votre pseudo" name="pseudo" required>
      </div>

      <div class="mb-3 text-center">
        <label for="phone" class="form-label">Votre numéro de téléphone</label>
        <input type="tel" class="form-control" id="phone" placeholder="Votre numéro de téléphone" name="phone" required>
      </div>

      <div class="mb-3 text-center">
        <label for="password" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Votre mot de passe" name="mdp" required>
      </div>

      <div class=" mb-3 text-center">
        <label for="confirmMdp" class="form-label">Confirmez votre mot de passe</label>
        <input type="password" class="form-control" id="confirmMdp" name="confirmMdp" class="text-center">
      </div>

      <div class="showPass">
        <label for="showpassConfirm" class="text-danger"><input type="checkbox" onclick="showPass()" id="showpassConfirm">Afficher/masquer le mot de passe</label>
      </div>


      <div class="text-center">
        <input class="btn-form" type="submit" value="S'inscrire" />
      </div>
    </form>

    <p style="color: red;" id="erreur"></p>

  </section>
</main>

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
<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script> -->