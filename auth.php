<?php
session_start();
require_once("./SqlConnect.php");

if (empty($_POST)) {

    //  Redirection vers la page de création de compte
    header('Location:./create.html');
    exit();
}
// Si on a cliqué sur le bouton "Créer un compte"
elseif (isset($_POST['create'])) {

    $hashPassword = password_hash($_POST['password'], PASSWORD_BCRYPT); // Autre méthode possible : $hashPassword2 = hash('sha512', $_POST['password']);

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
    echo "log in";
}
