<?php
require_once("header.php");
$login = $_GET["login"];

include_once("sanitizar.php");
$login = sanitizar($login);
?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div>
            <h1 class="mt-5">Excluir Usuario</h1>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Confirmar Exclusão de Usuário</div>
                    <div class="card-body">
                        <h5 class="card-title">Tem certeza que deseja excluir usuário?</h5>
                        <p class="card-text">
                            O usuário excluído será o <?php echo $login;?>
                        </p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-success mr-1" href="listarUsuarios.php">
                                Cancelar
                            </a>
                            <a class="btn btn-dark ml-1" href="executarExclusao.php?login=<?php echo $login?>">
                                Confirmar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
</main>


<?php

require_once("footer.php");
