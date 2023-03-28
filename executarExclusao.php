<?php

//Receber o nome do usuário
//Buscar no banco de dados
//Excluir
//Avisar ao usuário
session_start();

require_once("conexaoBanco.php");

$login = $_GET["login"];

$sql = "DELETE FROM usuario WHERE login = '$login'";

$resultado = mysqli_query($connection, $sql);

if ($resultado == true) {
    $msg = "<div class='row alert alert-success fade show mb-5' role='alert'>
        Usuário excluído com sucesso
    </div>";
} else {
    $msg = "<div class='row alert alert-danger alert-dismissible fade show mb-5' role='alert'>
        Falha ao excluir usuário
    </div>";
}

$_SESSION["msg"] = $msg;
mysqli_close($connection);

header("Location: listarUsuarios.php");