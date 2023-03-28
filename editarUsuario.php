<?php

require_once("header.php");
include_once("sanitizar.php");
include_once("conexaoBanco.php");

$dados = sanitizar($_GET);

$sql = "SELECT * FROM usuario WHERE login = '{$dados['login']}'";
$mysql = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($mysql);

print_r($row);
?>

<main role="main" class="flex-shrink-0 mb-5">
    <div class="container">
        <h1 class="mt-5 mb-5">Editar Usuário</h1>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="salvarUsuario.php" method="post" id="formCadastroUsuario">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required value="<?php echo $row["login"]?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $row["nome"]?>">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required value="<?php echo $row["senha"]?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Endereço de E-mail</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required value="<?php echo $row["email"]?>">
                    </div>
                    <div class="form-group">
                        <label for="permissao">Permissão</label>
                        <select class="form-control" name="permissao">
                            <option>Admin</option>
                            <option>Normal</option>
                            <option>Leitura</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</main>

<?php

require_once("footer.php");
