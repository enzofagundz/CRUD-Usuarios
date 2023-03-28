<?php
session_start();
include_once("sanitizar.php");

$dadosFormulario = sanitizar($_POST); //Envia para o sanitizar remover tags e espaços em branco

//Passando os dados sanitizados para variáveis
$login = $dadosFormulario["login"];
$nome = $dadosFormulario["nome"];
$senha = $dadosFormulario["senha"];
$email = $dadosFormulario["email"];
$permissao = $dadosFormulario["permissao"];

//Verifica se o usuário já está cadastrado
include_once("verificarCadastro.php");

//A variável $verificarCadastro recebe o retorno da função verificarCadastro
$verificarCadastro = verificarCadastro($login);

//Verifica se o usuário já está cadastrado através da variável $verificarCadastro
if ($verificarCadastro == false) {
    //require_once("conexaoBanco.php");

    //Caso o usuário não esteja cadastrado
    //Conecto com o banco de dados

    $dbuser = "root";
    $dbpass = "";
    $dbname = "crudproduto";
    $dbhost = "localhost:3306";
    
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //Crio a query
    $sql = "INSERT INTO `usuario` (`login`, `nome`, `senha`, `email`, `permissao`) VALUES ('$login', '$nome', '$senha', '$email', '$permissao')";
    
    //Executo a query
    $mysql = mysqli_query($connection, $sql);
    
    //Declaro a variável $msg para devolver ao usuário uma mensagem de sucesso ou erro
    $msg = "";

    //Declaro a variavel $localizacao para redirecionar o usuário para a página de cadastro ou para a página de listagem
    $localizacao = "";
    //Verifico se a query foi executada com sucesso
    if ($mysql == true) {

        //Se sim, retorna uma mensagem de sucesso
        $msg = "<div class='row alert alert-success fade show mb-5' role='alert'>
            Usuário cadastrado com sucesso
        </div>";

        //Seta a variável $localizacao para redirecionar o usuário para a página de listagem
        $localizacao = "listarUsuarios.php";
        //header("Location: listarUsuarios.php");
    } else {
        
        //Se não, retorna uma mensagem de erro
        $msg = "<div class='row alert alert-danger alert-dismissible fade show mb-5' role='alert'>
        Falha ao cadastrar usuário
        </div>";
        
        //Seta a variável $localizacao para redirecionar o usuário para a página de cadastro para corrigir os erros
        $localizacao = "cadastrarUsuarios.php";
    }
    
    //Fecha a conexão com o banco de dados
    mysqli_close($connection);
    
    //A variável $_SESSION["msg"] recebe a mensagem de sucesso ou erro
    $_SESSION["msg"] = $msg;

    //Redireciona o usuário para a página de cadastro
    header("Location: $localizacao");
    
} else {

    //Se o usuário já estiver cadastrado, passo os dados do formulário para a variável $_SESSION
    $_SESSION["nome"] = $nome;
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;

    //Redireciona o usuário para a página de cadastro, com a mensagem de erro no parâmetro da URL
    header("Location: cadastrarUsuarios.php?msg=erro");
} 