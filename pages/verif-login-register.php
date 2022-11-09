<?php


// ---------------------
function register($nom, $prenom, $email, $password)
{
    // je crée le tableau
    session_start();
    $newUser = [
        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $email,
        "password" => $password
    ];

    // s'il n'y a pas encore d'user dans la base, la clé n'existe pas
    // si la clé n'existe pas
    if (!array_key_exists("users", $_SESSION)) {
        // alors je crée un tableau d'users
        $_SESSION['users'] = array();
        // sinon
    }
    array_push($_SESSION['users'], $newUser);
    var_dump($_SESSION);
    return true;
}


// ---------------------
function login(string $email, string $password)
{
    session_start();
    if (!empty($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                return true;
            }
        }
    }
    return false;
}



// --------------- VERRIFICATION DE CONNEXION --------------
$isLogged = login($_POST['email'], $_POST['password']);

// si la connexion est bonne
if ($isLogged) {
    // j'affiche
    echo "Vous êtes connecté";
}
// sinon, je renvoie un message d'erreur
else {
    echo "Erreur de connexion, veuillez vérifier votre mot de pass ou email";
}


// --------------- VERRIFICATION D'INSCRIPTION --------------
if ($_POST['confirm'] === $_POST['password']) {
    $isRegister = register($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['password']);
    if ($isRegister) {
        // j'affiche un message
        echo "Enregistrement sauvegardé, vous pouvez vous connecter";
    } else {
        // j'affiche un message d'erreur en cas de problème
        echo "Erreur, veuillez verifier votre mot de passe";
    }
}
