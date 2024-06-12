<!-- Fichier qui contient les fonctions php à utiliser dans mon blog  -->
<?php

session_start();

define("RACINE_SITE","/ka_dans_ka/"); 
// constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemin absolus à partir de localhost (on ne prend pas locahost). Ainsi nous écrivons tous les chemins (exp : src, href) en absolus avec cette constante.




// / Constante du serveur => localhost

define("DBHOST", "localhost");

// Constante de l'utilisateur de la BDD du serveur en local  => root
define("DBUSER", "root");

// Constante pour le mot de passe de serveur en local => pas de mot de passe
define("DBPASS", "");

// Constante pour le nom de la BDD
define("DBNAME", "ka_dans_ka");



//// FONCTION DE DECONNEXION////


function connexionBdd()
{

   

    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    try {

        $pdo = new PDO($dsn, DBUSER, DBPASS);

        // On définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        die($e->getMessage());
    }

    return $pdo;
}


// FONCTION DEBUG

function debug($var)
{

    echo '<pre class="border border-dark bg-light text-primary w-50 p-3">';

    var_dump($var);

    echo '</pre>';
}


// FUNCTION  ALERT


function alert(string $contenu, string $class)
{
    // Retourne le code HTML pour afficher le message d'alerte
    return "<div class='alert alert-$class alert-dismissible fade show text-center w-75 m-auto mb-5' role='alert'>
        <!-- Contenu du message d'alerte -->
        $contenu

        <!-- Bouton pour fermer l'alerte -->
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

    </div>";
}
//// FONCTION DE DECONNEXION //


function logOut()
{

    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'deconnexion') {


        unset($_SESSION['user']);
        // On supprime l'indice "user " de la session pour se déconnecter 

        //session_destroy(); // Détruit toutes les données de la session déjà  établie . cette fonction détruit la session sur le serveur 

        header("location:" . RACINE_SITE . "index.php");
     
    }
}
logOut();



//////////////////// Fonctions du CRUD pour les utilisateurs Users /////////////////////

function inscriptionUsers(string $pseudo, string $email, string $mdp) : void
{

    $pdo = connexionBdd(); // je stock ma connexion  à la BDD dans une variable

    $sql = "INSERT INTO users 
        (pseudo, email, mdp)
        VALUES
        (:pseudo, :email, :mdp)"; // Requête d'insertion que je stock dans une variable
    $request = $pdo->prepare($sql); // Je prépare ma requête et je l'exécute
    $request->execute(
        array(
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':mdp' => $mdp
         

        )
    );
}


////////////////// Fonction pour vérifier si un email existe dans la BDD ///////////////////////////////

function checkEmailUser(string $email): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':email' => $email

    ));

    $resultat = $request->fetch();
    return $resultat;
}

////////////////// Fonction pour vérifier si un pseudo existe dans la BDD ///////////////////////////////

function checkPseudoUser(string $pseudo)
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':pseudo' => $pseudo

    ));

    $resultat = $request->fetch();
    return $resultat;
}

/////////// Fonction pour vérifier un utilisateur ////////////////////


function checkUser(string $pseudo): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':pseudo' => $pseudo
    ));
    $resultat = $request->fetch();
    return $resultat;
}

//  /////////////////Fonction pour récupérer tous les utilisateurs///////////////////

function allUsers(): array
{

    $pdo = connexionBdd();
    $sql = "SELECT * FROM users";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
}




// /////////////////  Fonction pour recupereer un seul utilisateur  //////////////////////

function showUser(int $id): array
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute(array(

        ':id' => $id

    ));
    $result = $request->fetch();
    return $result;
}


// /////////////////  Fonction pour supprimer un utilisateur  ///////////////////////


function deleteUser(int $id): void
{
    $pdo = connexionBdd();
    $sql = "DELETE FROM users WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute(array(

        ':id' => $id

    ));
}


// FONCTION POUR MODIFIER LE ROLE


function updateRole(string $role, int $id): void
{
    // Établissement de la connexion à la base de données
    $pdo = connexionBdd();
    
    // Définition de la requête SQL pour mettre à jour le rôle de l'utilisateur
    $sql = "UPDATE users SET role = :role WHERE id = :id";
    
    // Préparation de la requête SQL pour éviter les injections SQL
    $request = $pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres $role et $id
    $request->execute(array(
        ':role' => $role, // Affectation du nouveau rôle à la variable :role
        ':id' => $id // Affectation de l'identifiant de l'utilisateur à la variable :id
    ));
}



//////FONCTION AJOUT POST (ARTICLES)////

function addPosts(string $image, string $title, string $content, string $author, string $created_at): void
{

    $pdo = connexionBdd();

    $sql = "INSERT INTO posts (image, title, content, author, created_at)
     VALUES (:image, :title, :content, :author, :created_at)";
    $request = $pdo->prepare($sql);
    $request->execute(array(

        ':image' => $image,
        ':title' => $title,
        ':content' => $content,
        ':author' => $author,  
        ':created_at' => $created_at
   
    ));

}

// FONCTION POUR AFFICHER TOUTES LES ARTICLES 

function allPosts() {

    $pdo = connexionBdd();
    
    $sql = "SELECT * FROM posts ORDER BY id ASC";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
}





// FONCTION POUR MODIFIER UN ARTICLE 

function updatePost(int $id, string $image, string $title, string $content, string $author,  string $created_at) : void 
{
    $pdo = connexionBdd();
    $sql = "UPDATE posts 
                    SET image = :image, 
                        title = :title, 
                        content = :content, 
                        author = :author, 
                        created_at = :created_at 
                    WHERE id = :id"; 
    $request = $pdo->prepare($sql);
    $request->execute(array (
        ':id' => $id,
        ':image' => $image,
        ':title' => $title,
        ':content' => $content,
        ':author' => $author,
        ':created_at' => $created_at
    ));
}


// FONCTION POUR SUPPRIMER UN ARTICLE 

function deletePost(int $id): void
{
    $pdo = connexionBdd();

    $sql = "DELETE FROM posts WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute([':id' => $id]);
}



//FONCTION POUR VOIR UN ARTICLE

function showPost(int $id): array
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM posts WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute([
        ':id' => $id
    ]);
    $result = $request->fetch();
    return $result;
}




?>