<?php
// 1 - Connexion à la BDD via la page init.inc.php

require_once 'inc/functions.inc.php';




if (!empty($_SESSION['user'])) {

  header("location:" . RACINE_SITE . "profil.php");
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
    // debug($_POST);


    $info = alert("Veuillez renseigner tout les champs", "danger");
    echo $info;
  } else {






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

    if (strlen($mdp) < 5 || strlen($mdp) > 12) {

      $info .= alert("Le mot de passe n'est pas valide.", "danger");
    }
    if ($mdp !== $confirmMdp) {

      $info .= alert("Le mot de passe et la confirmation doivent être identique.", "danger");
    }


    if (strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $info .= alert("L'email n'est pas valide.", "danger");
    }

    // if (!preg_match('#^[0-9]+$#', $phone) || strlen($phone) > 10 || !trim($phone)) {

    //   $info .= alert("Le Téléphone n'est pas valide.", "danger");

    // }
    // debug($_POST);

  }

  if (empty($info)) {
    debug($_POST);
    $emailExist = checkEmailUser($email);
    $pseudoExist = checkPseudoUser($pseudo);


    if ($emailExist || $pseudoExist) {

      $info = alert("Vous avez déjà un compte", "danger");
    } else if ($mdp !== $confirmMdp) {

      $info .= alert("Le mot de passe et la confirmation doivent être identiques.", "danger");
    } else {

      $mdp = password_hash($mdp, PASSWORD_DEFAULT);

      inscriptionUsers($first_name, $last_name, $pseudo, $email, $mdp, $phone);

      $info = alert('Vous êtes bien inscrit, vous pouvez vous connectez !', 'success');
      header('Location:' . RACINE_SITE . 'connexion.php');
    }
  }

  // debug($_POST);



}

$title = "Inscription";

require_once 'inc/header.inc.php';
echo $info;


?>

<main>
  <!-- SECTION INSCRIPTION AVEC TITRE PARAGRAPHE ET FORMULAIRE  -->
  <section class="inscript">
    <div>
      <h1 class="title w-100">Rejoignez notre communauté de Gwoka !</h1>
      <p> Inscrivez-vous dès maintenant pour découvrir les dernières actualités sur cet art traditionnel guadeloupéen.</p>
    </div>
  </section>

  <!-- FORMULAIRE INSCRIPTION -->

  <section class="formu">
    <form action="" method="post" id="inscription" class="mt-5 w-50">
     
      <div class="mb-3 text-center">
        <label for="prenom" class="form-label">Votre prénom</label>
        <input type="text" class="form-control" id="prenom" placeholder="Votre prenom" name="first_name">
      </div>

      <div class="mb-3 text-center">
        <label for="nom" class="form-label">Votre nom</label>
        <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="last_name">
      </div>

      <div class="mb-3 text-center">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" id="email" placeholder="Votre email" name="email">
      </div>

      <div class="mb-3 text-center">
        <label for="username" class="form-label">Votre pseudo</label>
        <input type="text" class="form-control" id="username" placeholder="Votre pseudo" name="pseudo">
      </div>

      <div class="mb-3 text-center">
        <label for="phone" class="form-label">Votre numéro de téléphone</label>
        <input type="tel" class="form-control" id="phone" placeholder="Votre numéro de téléphone" name="phone">
      </div>

      <div class="mb-3 text-center">
        <label for="password" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" name="mdp">
      </div>

      <div class=" mb-3 text-center">
        <label for="confirmMdp" class="form-label">Confirmez votre mot de passe</label>
        <input type="password" class="form-control" id="confirmMdp" name="confirmMdp" class="text-center">
      </div>

      <div class="showPass">
        <label for="showpassConfirm" class="text-white"><input type="checkbox" onclick="showPass()" id="showpassConfirm">Afficher/masquer le mot de passe</label>
      </div>


      <div class="text-center">
        <input class="btn" type="submit" value="S'inscrire" />
      </div>
    </form>

    <p style="color: red;" id="erreur"></p>

  </section>
</main>

<?php

require_once 'inc/footer.inc.php';

?>