<?php
  function cria_grafo($vetorVertices, $probabilidade){
    $matriz = array();

    if($probabilidade<0 || $probabilidade>1):
      echo 'Valor de probabilidade fora do padrão, deve ser entre 0 e 1.';
    else:
      for ($i=0;$i<count($vetorVertices);$i++){
        $linha = array();
        for ($j=0;$j<count($vetorVertices);$j++){
          $num_aleatorio = rand(0,10) / 10;
          ($probabilidade > $num_aleatorio) ? $linha[$j] = 1 : $linha[$j] = 0;
        }
        $matriz[$i] = $linha;
      }
    endif;
    return $matriz;
  }

  function atualiza_matriz($vetorVerticesNovos, &$matriz, $probabilidade){
    $num_aleatorio = rand(0,10) / 10;
    for($j=0;$j<count($matriz);$j++){
      for($i=0;$i<count($vetorVerticesNovos);$i++){
        ($probabilidade > $num_aleatorio) ? array_push($matriz[$j], 1) : array_push($matriz[$j], 0);
      }
    }
    return $matriz;
  }

  $m = cria_grafo(['Maria','João','Roberto'], 0.2);
  $m_original = $m;
  $m_nova = atualiza_matriz(['Rita','Cássia'], $m_original, 0.2);
  echo "<pre>";
  print_r($m);
  echo "</pre>";
  echo "------------------------------------------------------------------";
  echo "<pre>";
  print_r($m_nova);
  echo "</pre>";

  
?>
