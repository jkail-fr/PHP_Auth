<?php

/*
#############################################################################################
# Ceci est un fichier d'exemple, veuillez vous référer au README pour plus d'informations ! #
#############################################################################################
*/

$dbname = '';
$host = '';
$login = '';
$password = '';

try {
    $SQL = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $login, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
