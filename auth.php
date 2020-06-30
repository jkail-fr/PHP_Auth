<?php
session_start();
require_once('SQL_connect.php');


if (empty($_POST)) 
{
    //redirection vers page de creation
    header('Location: ./create.html');
    exit();
} 
elseif (isset($_POST['create'])) {
    // Vérification de l'existence du pseudo puis de l'email dans la BDD avant d'éxecuter le code de création
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    
    $checkExistingPseudo = dbCheck('pseudo', $pseudo);
    
    if ($checkExistingPseudo == false)
       {
        $checkExistingEmail = dbCheck('email', $email);
        if ($checkExistingEmail == false)
        { 
            $hashPassword=password_hash($_POST['password'], PASSWORD_BCRYPT); // ou PASSWORD_ARGON2I ?
            
            $createUser = $SQL->prepare("INSERT INTO users(pseudo, userPassword, email) VALUES (:pseudo, :userPassword, :email )");
            $createUser->execute(array(
                'pseudo' => $_POST['pseudo'],
                'userPassword' => $hashPassword,
                'email' => $_POST['email']));

            $_SESSION['pseudo'] = $_POST['pseudo'];
        }
        else {
            echo 'Le pseudo '. $_POST['email'].' existe déjà.';
        }
       }
    else { 
        echo 'Le pseudo '. $_POST['pseudo'].' existe déjà.';
        }
}
else 
{
    //$email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $checkExistingPseudo = dbCheck('pseudo', $pseudo);
    if ($checkExistingPseudo == true)
       {
        $storedPswd = $SQL->prepare("SELECT userPassword FROM users WHERE pseudo = :pseudo");
        $storedPswd->execute(array('pseudo' => $pseudo));
        $result = $storedPswd->fetch();
        if (password_verify($password, $result[0]) == true )
        {
        $_SESSION['pseudo'] = $pseudo;
        echo "Welcome asshole";
        }
        else
        {
         echo "Erreur de mot de passe";
        }
       }
}