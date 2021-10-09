<?php
    class Aluno {
        private $nome, $cr;

        public function __construct($nome, $cr){
            $this->nome = $nome;
            $this->cr = $cr;
        }

        public function getNome($nome){
            return $this->$nome;
        }

        function inscreveDisciplina($disciplina){
            $disciplina->insere($this);
        }

        static function cmp_obj($a, $b){
            $a_cr = $a->cr;
            $b_cr = $b->cr;
            return ($a_cr < $b_cr) ? 1 : (($a_cr > $b_cr) ? -1 : 0);
        }
    }

    class Disciplina {
        private $alunosInscritos = array();
        private $nomeDisciplina;

        public function __construct($nomeDisciplina){
            $this->nomeDisciplina = $nomeDisciplina;
        }

        public function getAlunosInscritos(){
            usort($this->alunosInscritos, array("Aluno", "cmp_obj"));
            return $this->alunosInscritos;
        }

        public function insere($aluno){
            array_push($this->alunosInscritos, $aluno);
        }
    }

    class TurmasDisciplina {
        private $turmas = array();
        private $nmax;

        public function __construct($nmax){
            $this->nmax = $nmax;
        }

        public function imprimeTurmas(){
            $totalTurmas = count($this->turmas);
            if($totalTurmas == 0){
                echo "O método calcula turmas não foi chamado ou então não existem alunos nessa turma";
            } else {
                echo "<pre>";
                echo "O total de turmas formadas foi: " .$totalTurmas, "<br>";
                print_r($this->turmas);
                echo "</pre>";
            }
        }

        public function calculaTurmas($disciplina){
            $this->turmas = array_chunk($disciplina->getAlunosInscritos(), $this->nmax);
        }
    }

    $aluno1 = new Aluno("João", 8.5);
    $aluno2 = new Aluno("Ana", 9.0);
    $aluno3 = new Aluno("Maria", 9.5);
    $aluno4 = new Aluno("Davi", 10);
    $aluno5 = new Aluno("Gabriel", 9.9);
    $aluno6 = new Aluno("Maria Eduarda", 9.8);
    $aluno7 = new Aluno("Alex", 10);
    $aluno8 = new Aluno("Lizandra", 9.9);

    $disciplina1 = new Disciplina("PAW");

    $turmasDisciplina = new TurmasDisciplina(3);

    $aluno1->inscreveDisciplina($disciplina1);
    $aluno2->inscreveDisciplina($disciplina1);
    $aluno3->inscreveDisciplina($disciplina1);
    $aluno4->inscreveDisciplina($disciplina1);
    $aluno5->inscreveDisciplina($disciplina1);
    $aluno6->inscreveDisciplina($disciplina1);
    $aluno7->inscreveDisciplina($disciplina1);
    $aluno8->inscreveDisciplina($disciplina1);

    $turmasDisciplina->calculaTurmas($disciplina1);
    $turmasDisciplina->imprimeTurmas();
?>