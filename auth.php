<?php
session_start();
require_once("SqlConnect.php");

if (empty($_POST)) {

    //  Redirection vers la page de création de compte
    header('Location:create.html');
    exit();
}
// Si on a cliqué sur le bouton "Créer un compte"
elseif (isset($_POST['create'])) {

    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];

    // Recherche du pseudo dans la BDD
    $checkExistingPseudo = dbCheck('pseudo', $pseudo);

    // Vérification de l'existence du pseudo dans la BDD lors de la création de compte
    if ($checkExistingPseudo == true) {
        echo "toto";
        // Recherche du mail dans la BDD
        $checkExistingEmail = dbCheck('email', $email);

        // Vérification de l'existence du mail dans la BDD lors de la création de compte
        if ($checkExistingEmail == true) {
            echo "tata";
            $hashPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // On créé l'utilisateur
            $createUser = $SQL->prepare("INSERT INTO users(pseudo, userPassword, email) VALUES (:pseudo, :userPassword, :email)");
            $createUser->execute(array(
                "pseudo" => $_POST['pseudo'],
                "userPassword" => $hashPassword,
                "email" => $_POST['email']
            ));

            // Création des variables de session
            $_SESSION['pseudo'] = $_POST['pseudo'];
        } else {
            echo "titi";
            echo "L'email ou  le pseudo existe déjà !";
        }
    } else {
        echo "tyty";
        echo "L'email ou  le pseudo existe déjà !";
    }
} else {
    echo "log in";
}
