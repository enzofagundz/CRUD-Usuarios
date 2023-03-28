<?php
require_once "conexaoBanco.php";
require_once "header.php";
?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <h1 class="mt-5 mb-5">Listar Usuários</h1>
        </div>
        <?php
            session_start();

            if(isset($_SESSION["msg"])) {
                echo $_SESSION["msg"];
                unset($_SESSION["msg"]);
            }
        ?>
        <?php
        $sql = "SELECT * FROM usuario";
        $mysql = mysqli_query($connection, $sql);
        //$rows = mysqli_fetch_assoc($mysql);

        if (mysqli_num_rows($mysql) === 0) {
            echo "<div class='row alert alert-warning alert-dismissible fade show' role='alert'>
            Nenhum usuário cadastrado.
            </div>";
        } else {

            echo '<div class = "row justify-content-center">';
            echo '<div class="col-md-7">';
            echo '<table class = "table table-hover table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope = "col">Login</th>';
            echo '<th scope = "col">Nome</th>';
            echo '<th scope = "col">E-mail</th>';
            echo '<th scope = "col">Permissão</th>';
            echo '<th scope = "col">Editar/Excluir</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($mysql as $row) {
                $login = $row["login"];
                $nome = $row["nome"];
                $email = $row["email"];
                $permissao = $row["permissao"];

                echo '<tr>';
                echo "<th scope = 'row'>$login</th>";
                echo "<td>$nome</td>";
                echo "<td>$email</td>";
                echo "<td>$permissao</td>";
                echo "<td>
                <div class='d-flex justify-content-around'>
                <a class='btn btn-info mr-1' href='editarUsuario.php?login=$login'>
                        Editar
                </a>
                <a class='btn btn-danger ml-1' href='excluirUsuario.php?login=$login'>
                        Excluir
                </a>
                </div>
                </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo '</div>';
        }

        ?>
</main>

<?php
require_once "footer.php";
