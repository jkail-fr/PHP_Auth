<?php
require_once('SQL_connect.php');


if (empty($_POST)) 
{
    //redirection vers page de creation
    header('Location: ./create.html');
    exit();
} 
elseif (isset($_POST['create'])) {
   echo 'creation en cours';
}
else 
{
    echo "log in";
}
