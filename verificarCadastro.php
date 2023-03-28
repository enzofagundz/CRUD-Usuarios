<?php

//Recebe o login do usuário para verificar se já está cadastrado
function verificarCadastro ($login) {
    //Conecto com o banco de dados
    require_once "conexaoBanco.php";

    //Busco no banco de dados registros que contenham o login passado via parâmetro
    $sql = "SELECT * FROM usuario WHERE login = '$login'";

    //Executo minha query
    $mysql = mysqli_query($connection, $sql);

    //Verifico se a query retornou algum registro
    if (mysqli_num_rows($mysql) > 0) {

        //Se retornou algum registro, a variável $msg recebe uma mensagem de erro
        $msg = "<div class='row alert alert-danger alert-dismissible fade show mb-5' role='alert'>
        Usuário $login já cadastrado, tente outro login
        </div>";
        
        //A variável de $_SESSION["msg"] recebe a mensagem de erro
        $_SESSION["msg"] = $msg;

        //Retorno true para a variável $verificarCadastro no arquivo salvarUsuario.php
        return true;
    } else {

        //Se não retornou nenhum registro, retorno false para a variável $verificarCadastro no arquivo salvarUsuario.php
        return false;
    }
}