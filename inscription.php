<?php


require_once 'inc/functions.inc.php';

// Vérification si l'utilisateur est déjà connecté
if (!empty($_SESSION['user'])) {
  // Si oui, redirection vers la page de profil
  header("location:" . RACINE_SITE . "profil.php");
}

// Affichage d'un espace pour séparer les éléments
echo "<br><br><br><br><br>";

// Initialisation d'une variable pour stocker les messages d'erreur ou de succès
$info = '';

// Vérification si le formulaire d'inscription a été envoyé
if (!empty($_POST)) { 
  // debug($_POST); // Affichage des données du formulaire pour débogage

  // Initialisation d'une variable pour vérifier si tous les champs sont remplis
  $verif = true;

  // Boucle pour vérifier si tous les champs du formulaire sont remplis
  foreach ($_POST as $value) {
    if (empty($value)) {
      // Si un champ est vide, on met $verif à false
      $verif = false;
    }
  }

  // Si un champ est vide, on affiche un message d'erreur
  if (!$verif) {
    // debug($_POST); // Affichage des données du formulaire pour débogage
    $info .= alert("Veuillez renseigner tout les champs", "danger");
    echo $info;
  } else {
    // Récupération des données du formulaire
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;
    $confirmMdp = isset($_POST['confirmMdp']) ? $_POST['confirmMdp'] : null;

    // Vérification des données du formulaire
    if (strlen($pseudo) < 2) {
      // Si le pseudo est trop court, on ajoute un message d'erreur
      $info .= alert("Le pseudo n'est pas valide.", "danger");
    }

    if (strlen($mdp) < 5 || strlen($mdp) > 12) {
      // Si le mot de passe est trop court ou trop long, on ajoute un message d'erreur
      $info .= alert("Le mot de passe n'est pas valide.", "danger");
    }
    if ($mdp !== $confirmMdp) {
      // Si le mot de passe et la confirmation ne sont pas identiques, on ajoute un message d'erreur
      $info .= alert("Le mot de passe et la confirmation doivent être identique.", "danger");
    }

    if (strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // Si l'email est trop long ou n'est pas valide, on ajoute un message d'erreur
      $info .= alert("L'email n'est pas valide.", "danger");
    }

    // Si il n'y a pas d'erreur, on vérifie si l'email ou le pseudo existe déjà
    if (empty($info)) {
      //debug($_POST); // Affichage des données du formulaire pour débogage
      $emailExist = checkEmailUser($email);
      $pseudoExist = checkPseudoUser($pseudo);

      if ($emailExist || $pseudoExist) {
        // Si l'email ou le pseudo existe déjà, on ajoute un message d'erreur
        $info .= alert("Vous avez déjà un compte", "danger");
      } else if ($mdp !== $confirmMdp) {
        // Si le mot de passe et la confirmation ne sont pas identiques, on ajoute un message d'erreur
        $info .= alert("Le mot de passe et la confirmation doivent être identiques.", "danger");
      } else {
        // Hashage du mot de passe pour stockage sécurisé
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);

        // Inscription de l'utilisateur
        inscriptionUsers($pseudo, $email, $mdp);

        // Affichage d'un message de succès et redirection vers la page de connexion
        header('Location:' . RACINE_SITE . 'connexion.php');

        $info.= alert("Vous êtes bien inscrit, vous pouvez vous connectez !", "success");

      }
    }
  }
}


$title = "Inscription";

require_once 'inc/header.inc.php';




?>

<main>
  <!-- SECTION INSCRIPTION AVEC TITRE PARAGRAPHE ET FORMULAIRE  -->
  <section class="inscript">
    <div>
      <!-- Titre de la section d'inscription -->
      <h1 class="title w-100">Rejoignez notre communauté de Gwoka !</h1>
      <!-- Paragraphe de présentation de l'inscription -->
      <p> Inscrivez-vous dès maintenant pour découvrir les dernières actualités sur cet art traditionnel guadeloupéen.</p>
    </div>
  </section>

  <!-- FORMULAIRE INSCRIPTION -->

  <section class="formu">
    <!-- Formulaire d'inscription avec méthode POST et action vide (envoi sur la même page) -->
    <form action="" method="post" id="inscription" class="mt-5 w-50">
     
      <!-- Champ pour le pseudo -->
      <div class="mb-3 text-center">
        <label for="username" class="form-label">Votre pseudo</label>
        <input type="text" class="form-control" id="username" placeholder="Votre pseudo" name="pseudo">
      </div>

      <!-- Champ pour l'email -->
      <div class="mb-3 text-center">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" id="email" placeholder="Votre email" name="email">
      </div>

      <!-- Champ pour le mot de passe -->
      <div class="mb-3 text-center">
        <label for="password" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" name="mdp">
      </div>

      <!-- Champ pour la confirmation du mot de passe -->
      <div class=" mb-3 text-center">
        <label for="confirmMdp" class="form-label">Confirmez votre mot de passe</label>
        <input type="password" class="form-control" id="confirmMdp" name="confirmMdp" class="text-center">
      </div>

      <!-- Bouton pour afficher/masquer le mot de passe -->
      <div class="showPass">
        <label for="showpassConfirm" class="text-white"><input type="checkbox" onclick="showPass()" id="showpassConfirm">Afficher/masquer le mot de passe</label>
      </div>

      <!-- Bouton de soumission du formulaire -->
      <div class="text-center">
        <input class="btn" type="submit" value="S'inscrire" />
      </div>
    </form>

    
  </section>
</main>

<?php

require_once 'inc/footer.inc.php';

?>