<?php
session_start();
include_once("sanitizar.php");

$dadosFormulario = sanitizar($_POST);

$login = $dadosFormulario["login"];
$nome = $dadosFormulario["nome"];
$senha = $dadosFormulario["senha"];
$email = $dadosFormulario["email"];
$permissao = $dadosFormulario["permissao"];

//print_r(array_keys($dadosFormulario));

require_once("conexaoBanco.php");

$sql = "INSERT INTO `usuario` (`login`, `nome`, `senha`, `email`, `permissao`) 
VALUES ('$login', '$nome', '$senha', '$email', '$permissao')";

$mysql = mysqli_query($connection, $sql);
$msg = "";

if ($mysql == true) {
    $msg = "<div class='row alert alert-success fade show mb-5' role='alert'>
        Usuário cadastrado com sucesso
    </div>";
    //header("Location: listarUsuarios.php");
} else {
    $msg = "<div class='row alert alert-danger alert-dismissible fade show mb-5' role='alert'>
    Falha ao cadastrar usuário
    </div>";
}

mysqli_close($connection);

$_SESSION["msg"] = $msg;
header("Location: listarUsuarios.php");
