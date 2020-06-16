<?php
//Voir le README pour configurer ce fichier
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

/**
 * Fonction de vérification d'informations dans la base de données
 *
 * @param string $type : "pseudo" ou "email" correspondant aux colonnes de la bdd
 * @param string $check : élément à comparer / à valider
 * @return false si aucune correspondance (<=> aucune entrée dans la base)
 */
function dbCheck ($type, $check) {
    $query = "
            SELECT $type
            FROM users 
            WHERE $type = '$check'";
    $param = $GLOBALS['SQL']->prepare($query);
    $param->execute();
    $result = $param->fetch();


    return $result;
}
