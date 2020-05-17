<?php
//VOir le README pour configurer ce fichier
$host='';
$dbname ='';
$login = '';
$pwd = '';

try {
    $SQL = new PDO('mysql:host=' . $host .';dbname='. $dbname .';charset=utf8', $login, $pwd);
} 
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

