<?php

function sanitizar($dados)
{

    if (is_array($dados)) {
        foreach ($dados as $chave => $valor) {
            $valor = htmlspecialchars(strip_tags($valor), ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $valor = str_replace("&#x", "", $valor);
            $valor = stripslashes($valor);
            $dados[$chave] = trim($valor);
        }
    } else {
        $dados = htmlspecialchars(strip_tags($dados), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $dados = str_replace("&#x", "", $dados);
        $dados = stripslashes($dados);
        $dados = trim($dados);
    }

    return $dados;
}
