<?php

require_once "header.php";

?>

<main role="main" class="flex-shrink-0 mb-5">
  <div class="container">
    <h1 class="mt-5 mb-5">Cadastrar Usuário</h1>
    <?php
    session_start();

    if (isset($_SESSION["msg"])) {
      echo $_SESSION["msg"];
      unset($_SESSION["msg"]);
    }
    ?>

    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <form action="salvarUsuario.php" method="post" id="formCadastroUsuario">
          <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" required>
          </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $nome = isset($_GET["msg"]) ?  $_SESSION['nome'] : ""; ?>">
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required value="<?php echo $nome = isset($_GET["msg"]) ?  $_SESSION['senha'] : ""; ?>">
          </div>
          <div class="form-group">
            <label for="email">Endereço de E-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required value="<?php echo $nome = isset($_GET["msg"]) ?  $_SESSION['email'] : ""; ?>">
          </div>
          <div class="form-group">
            <label for="permissao">Permissão</label>
            <select class="form-control" name="permissao">
              <option>Admin</option>
              <option>Normal</option>
              <option>Leitura</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
      <div class="col-sm-3"></div>
    </div>
  </div>
  <?php 
    unset($_SESSION);
    unset($_GET);
  ?>
</main>

<?php
require_once "footer.php";
//include_once "mudarValores.php";