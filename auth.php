<?php
require_once('SQL_connect.php');


if (empty($_POST)) 
{
    echo "créér un compte";
} 
else 
{
    echo "log in";
}
