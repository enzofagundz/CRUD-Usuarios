<?php

require_once("conexaoBanco.php");

$login = $_POST["login"];
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$permissao = $_POST["permissao"];

$sql = "UPDATE usuario SET nome = '$nome', login = '$login', senha = '$senha', email = '$email', permissao = '$permissao' WHERE login = '$login'";
$mysql = mysqli_query($connection, $sql);

if ($mysql) {
    echo "<div class='row alert alert-success alert-dismissible fade show' role='alert'>
    Usuário editado com sucesso.
    </div>";
} else {
    echo "<div class='row alert alert-danger alert-dismissible fade show' role='alert'>
    Erro ao editar usuário.
    </div>";
}

mysqli_close($connection);
header("Location: listarUsuarios.php");

?>