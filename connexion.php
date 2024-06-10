<?php

require_once "inc/functions.inc.php";


// Variable pour stocker les informations de retour
$info = '';

// Vérification si le formulaire a été soumis
if (!empty($_POST)) {
    // debug($_POST); // Affichage des données du formulaire pour débogage

    // Initialisation d'une variable pour vérifier si tous les champs sont remplis
    $verif = true;

    // Boucle pour vérifier si tous les champs sont remplis
    foreach ($_POST as $value) {
        if (empty($value)) {
            $verif = false; // Si un champ est vide, on met $verif à false
        }
    }

    // Si tous les champs ne sont pas remplis, on affiche un message d'erreur
    if (!$verif) {
        // debug($_POST); // Affichage des données du formulaire pour débogage
        $info = alert("Veuillez renseigner tout les champs", "danger"); // Message d'erreur
    } else {
        // Récupération des données du formulaire
        $pseudo = isset($_POST['pseudo'])? $_POST['pseudo'] : null;
        $email = isset($_POST['email'])? $_POST['email'] : null;
        $mdp = isset($_POST['mdp'])? $_POST['mdp'] : null;

        // Vérification si l'utilisateur existe déjà
        $user = checkUser($pseudo, $email);

        // Si l'utilisateur existe, on vérifie le mot de passe
        if ($user) {
            if (password_verify($mdp, $user['mdp'])) {
                // Si le mot de passe est correct, on stocke les informations de l'utilisateur en session
                $_SESSION['user'] = $user;
                // Redirection vers la page de profil
                header("location:". RACINE_SITE. "profil.php");
            } else {
                $info = alert("Les identifiants sont incorrectes", "danger"); // Message d'erreur
            }
        } else {
            $info = alert("Les identifiants sont incorrectes", "danger"); // Message d'erreur
        }
    }
}


$title = "Connexion";

require_once "inc/header.inc.php";

// debug($user); // Affichage des données de l'utilisateur pour débogage
// debug($_SESSION['user']); // Affichage des données de session pour débogage

?>

<!-- Contenu de la page -->
<main class="pt-5 mt-5">
    <div class="w-75 m-auto p-5">
        <h1 class=" title text-center p-3 mb-5">Connexion</h1>

        <!-- Affichage des informations de retour -->
        <?php echo $info;?>

        <!-- Formulaire de connexion -->
        <form action="" method="post" class="p-5">
            <div class="row mb-3">
                <div class="col-12 mb-5 text-center">
                    <label for="pseudo" class="form-label mb-3">Pseudo</label>
                    <input value="" type="text" class="form-control fs-5" id="pseudo" name="pseudo">
                </div>
                <div class="col-12 mb-5 text-center">
                    <label for="email" class="form-label">Email</label>
                    <input value="" type="email" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com">
                </div>
                <div class="col-12 mb-5 text-center">
                    <label for="mdp" class="form-label mb-3">Mot de passe</label>
                    <input value="" type="password" class="form-control fs-5 mb-3" id="mdp" name="mdp">
                </div>

                <!-- Bouton pour afficher/masquer le mot de passe -->
                <div class="showPass">
                    <label for="showpassConfirm" class="text-white"><input type="checkbox" onclick="showPass()" id="showpassConfirm">Afficher/masquer le mot de passe</label>
                </div>

                <!-- Bouton de connexion -->
                <div class="text-center">
                    <button class="  btn" type="submit">Se connecter</button>
                </div>

                <!-- Lien pour créer un compte -->
                <p class="mt-5 text-center">Vous n'avez pas encore de compte! <a href="<?= RACINE_SITE?>inscription.php" class=" text-white">créer un compte ici</a></p>
            </div>
        </form>

    </div>
</main>

<?php
require_once "inc/footer.inc.php";
?>