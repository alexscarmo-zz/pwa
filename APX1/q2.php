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

    function veiculos_pernoitaram($veiculos, $mes){
        $lista = array();
        $vetor_busca = array();
        for ($m=0;$m<count($veiculos);$m++){
            $data = $veiculos[$m]["data"];
            if (substr($data, 3, 2) == $mes){
                array_push($vetor_busca, $veiculos[$m]);
            }
        }

        if(count($vetor_busca) == 0){
            print('Não existem pernoites de veículos nesse mês');
        } else {
            for ($i=0;$i<count($vetor_busca);$i++){
                $placa = $vetor_busca[$i]["placa"];
                $data = $vetor_busca[$i]["data"];
                $j = 1;
                while ($j < count($vetor_busca)) {
                    $placa_consulta = $vetor_busca[$j]["placa"];
                    $data_consulta = $vetor_busca[$j]["data"];
                    if ($placa == $placa_consulta && $data < $data_consulta){
                        $lista[] = $vetor_busca[$j];
                    }
                    $j++;
                }
            }
            print('<table border=1>');
            print('<tr><th>Placa</th><th>Câmera</th><th>Data</th><th>Hora</th></tr>');
            for ($k=0;$k<count($lista);$k++){
                print('<tr>');
                for($l=0;$l<count($lista[$k]);$l++){
                    print '<td>'.array_values($lista[$k])[$l].'</td>';
                }
                print('</tr>');
            }
            print('</table>');
        }
    }
    
    $dados = lerArquivo("arq1.csv");
    echo "<pre>";
    print_r($dados);
    echo "</pre>";
    print_r(veiculos_pernoitaram($dados, '09'));

?>