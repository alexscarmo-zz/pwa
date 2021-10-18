<?php
    function processa_mensagem($msg) {
        preg_match_all('/@[^.|,|!|?|\s]*/', $msg, $regex);
        $regex = array_unique($regex[0]);
        return $regex;
    }
    
    $mensagem = "Prezado @Flavio, gostaria de solicitar autorização para @Fulano realizar a
    operação de débito da conta de @Ciclano e crédito na conta de @Beltrano.
    Atenciosamente, @Fulano.";

    $valores = processa_mensagem($mensagem);
    
    echo "<pre>";
    print_r($valores);
    echo "</pre>";
?>