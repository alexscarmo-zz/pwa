<?php
    function lerArquivo($nome_arquivo) {
        $linha = 1;
        if (($arquivo = fopen($nome_arquivo, "r")) !== FALSE) {
            while (($dados = fgetcsv($arquivo, 1000, ";")) !== FALSE) {
                for ($c = 0; $c < count($dados); $c++) {
                    if ($linha == 1) {
                        $cab_coluna[] = $dados[$c];
                    }
                    else {
                        $elemento[$cab_coluna[$c]] = $dados[$c];
                    }
                }
                if (isset($elemento)) $lista[] = $elemento;
                $linha++;
            }
            fclose($arquivo);
        }
        return $lista;
    }

    function quantidade_veiculos($veiculos, $dt, $hr){
        $total = 0;
        for($i=0;$i<count($veiculos);$i++){
            if ($veiculos[$i]["data"] == $dt && $veiculos[$i]["hora"] == $hr){
                $total++;
            }
        }
        return "A quantidade total de veículos estacionados nesta data e horário são: ".$total;
    }
    $dados = lerArquivo("arq1.csv");
    echo "<pre>";
    print_r($dados);
    echo "</pre>";
    echo quantidade_veiculos($dados, "17-09-2021", "13:00");
?>