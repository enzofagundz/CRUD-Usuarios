<?php

//Receber o nome do usuário
//Buscar no banco de dados
//Excluir
//Avisar ao usuário


require_once("conexaoBanco.php");

$sql = "DELETE FROM usuario WHERE login = '$login'";

$mysql = mysqli_query($sql);