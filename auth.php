<?php

require_once("./SqlConnect.php");

if (empty($_POST)) {
    echo "Créer un compte";
} else {
    echo "log in";
}
