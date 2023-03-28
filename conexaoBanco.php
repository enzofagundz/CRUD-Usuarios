<?php

$dbuser = "root";
$dbpass = "";
$dbname = "crudproduto";
$dbhost = "localhost:3306";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$connection) {
    echo 'Falha ao conectar' . mysqli_error($connection);
    die();
}