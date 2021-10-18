<?php
    class Sensor{
        public $nome;
        public $medidas = array();

        public function __construct($nome){
            $this->nome = $nome;
        }

        public function obter_medida($medida){
            array_push($this->medidas, $medida);
        }

        public function transmitir($controlador){
            $controlador->medidas = $this->medidas;
        }

    }

    class Medida{
        public $temperatura, $data;

        public function __construct($temperatura, $data){
            $this->temperatura = $temperatura;
            $data_alterada = date_format($data, 'Y-m-d');
            $this->data = $data_alterada;
        }


    }

    class Controlador{
        private $nome;
        public $medidas = array();
        private $medidas_consulta = array();

        public function __construct($nome){
            $this->nome = $nome;
        }

        public function obter_media($s1, $data){
            $data_consulta = date_format($data, 'Y-m-d');
            for($i=0;$i<count($s1->medidas);$i++){
                $data_busca = $s1->medidas[$i]->data;
                if ($data_busca == $data_consulta){
                    array_push($this->medidas_consulta, $s1->medidas[$i]->temperatura);
                }
            }
            if(count($this->medidas_consulta) == 0){
                return null;
            } else {
                print('Para a data: '.$data_consulta.' no sensor: '.$s1->nome.' a maior temperatura foi: '
                .max($this->medidas_consulta).' e a menor foi: '.min($this->medidas_consulta));
            }
        }
    }

    $s1 = new Sensor("A00001");
    $s1->obter_medida(new Medida(15.0, new DateTime("2021-10-1")));
    $s1->obter_medida(new Medida(16.5, new DateTime("2021-10-1")));
    $s1->obter_medida(new Medida(18.3, new DateTime("2021-10-1")));
    $c1 = new Controlador("C00001");
    $s1->transmitir($c1);
    $c1->obter_media($s1, new DateTime("2021-10-1"));
?>