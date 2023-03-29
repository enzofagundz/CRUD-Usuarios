<?php
session_start();
require_once("conexaoBanco.php");

$login = $_SESSION["login"];
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$permissao = $_POST["permissao"];

$sql = "UPDATE usuario SET nome = '$nome', senha = '$senha', email = '$email', permissao = '$permissao' WHERE login = '$login'";
$mysql = mysqli_query($connection, $sql);

// $sql = "UPDATE usuario SET nome=?, senha=?, email=?, permissao=? WHERE login=?";
// $stmt = mysqli_prepare($connection, $sql);
// mysqli_stmt_bind_param($stmt, 'sssss', $nome, $senha, $email, $permissao, $login);
// $mysql = mysqli_stmt_execute($stmt);

$num_rows_affected = mysqli_affected_rows($connection);

if ($num_rows_affected > 0) {
    $msg = "<div class='row alert alert-success alert-dismissible fade show' role='alert'>
        Usuário editado com sucesso.
    </div>";
} else {
    $msg = "<div class='row alert alert-danger alert-dismissible fade show' role='alert'>
        Erro ao editar usuário. </div>";
}


$_SESSION["msg"] = $msg;
mysqli_stmt_close($stmt);
mysqli_close($connection);
header("Location: listarUsuarios.php");
