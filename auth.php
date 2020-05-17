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

    // $email = $_POST['email'];
    // $pseudo = $_POST['pseudo'];

    // Recherche du pseudo dans la BDD
    $existingPseudo = $SQL->prepare("SELECT pseudo from users WHERE pseudo=:pseudo");
    $existingPseudo->execute(array("pseudo" => $_POST['pseudo']));
    $checkExistingPseudo = $existingPseudo->fetch(PDO::FETCH_OBJ);
    // $checkExistingPseudo = dbCheck($pseudo);

    // Vérification de l'existence du pseudo dans la BDD lors de la création de compte
    if ($checkExistingPseudo == false) {

        // Recherche du mail dans la BDD
        $existingEmail = $SQL->prepare("SELECT email from users WHERE email=:email");
        $existingEmail->execute(array("email" => $_POST['email']));
        $checkExistingEmail = $existingEmail->fetch(PDO::FETCH_OBJ);

        // Vérification de l'existence du mail dans la BDD lors de la création de compte
        if ($checkExistingEmail == false) {
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
            echo "L'email ou  le pseudo existe déjà !";
        }
    } else {
        echo "L'email ou  le pseudo existe déjà !";
    }
} else {
    echo "log in";
}
