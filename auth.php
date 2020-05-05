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
        
        $hashPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $createUser = $SQL->prepare("INSERT INTO users(pseudo, userPassword, email) VALUES (:pseudo, :userPassword, :email )");
        $createUser->execute(array(
            'pseudo' => $_POST['pseudo'],
            'userPassword' => $hashPassword,
            'email' => $_POST['email']
        ));
        $_SESSION['pseudo'] = $_POST['pseudo'];
}
else 
{
    echo "log in";
}
