<?php

require_once "inc/functions.inc.php";


$info = '';

if (!empty($_POST)) {
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
    } else {
        $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;

        $user = checkUser($pseudo, $email);

        if ($user) {
            if (password_verify($mdp, $user['mdp'])) {
                $_SESSION['user'] = $user;

                header("location:" . RACINE_SITE . "profil.php");
            } else {
                $info = alert("Les identifiants sont incorrectes", "danger");
            }
        } else {
            $info = alert("Les identifiants sont incorrectes", "danger");
        }
    }
}

$title = "Connexion";
require_once "inc/header.inc.php";
// debug($user);
// debug($_SESSION['user']);

?>

<main class="pt-5 mt-5">
    <div class="w-75 m-auto p-5">
        <h1 class=" title text-center p-3 mb-5">Connexion</h1>

        <?php
        echo $info;
        ?>
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
               

                <div class="showPass">
                    <label for="showpassConfirm" class="text-white"><input type="checkbox" onclick="showPass()" id="showpassConfirm">Afficher/masquer le mot de passe</label>
                </div>

                <div class="text-center">
                    <button class="  btn" type="submit">Se connecter</button>
                </div>

                <p class="mt-5 text-center">Vous n'avez pas encore de compte ! <a href="<?= RACINE_SITE ?>inscription.php" class=" text-white">créer un compte ici</a></p>
            </div>
        </form>

    </div>
</main>

<?php
require_once "inc/footer.inc.php";
?>