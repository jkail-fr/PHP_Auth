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
    /*
    $ExistingPseudo = $SQL->prepare("SELECT pseudo from users WHERE pseudo=:pseudo");
    $ExistingPseudo->execute(array('pseudo'=>$_POST['pseudo']));
    $checkExistingPseudo = $ExistingPseudo->fetch(PDO::FETCH_OBJ);*/
    $checkExistingPseudo = dbCheck('pseudo', $pseudo);
    if ($checkExistingPseudo == true)
       {
           echo 'toto';
        $checkExistingEmail = dbCheck('email', $email);
        if ($checkExistingEmail == true)
        { echo 'tata';
            $hashPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);
            $createUser = $SQL->prepare("INSERT INTO users(pseudo, userPassword, email) VALUES (:pseudo, :userPassword, :email )");
            $createUser->execute(array(
                'pseudo' => $_POST['pseudo'],
                'userPassword' => $hashPassword,
                'email' => $_POST['email']
            ));
            $_SESSION['pseudo'] = $_POST['pseudo'];}
        else {
            echo 'titi';
            echo "l'email ou le pseudo est existe déjà.";
        }
       }
    else { 
        echo "l'email ou le pseudo est existe déjà.";
        }

}
else 
{
    echo "log in";
}
