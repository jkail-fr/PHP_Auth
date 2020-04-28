<?php

require_once("./SqlConnect.php");

if (empty($_POST)) {
    header('Location:./create.html');
    exit();
} elseif (isset($_POST['create'])) {
} else {
    echo "log in";
}
