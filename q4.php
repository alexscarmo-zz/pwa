<?php
    class Aluno {
        private $nome, $cr;

        public function __construct($nome, $cr){
            $this->nome = $nome;
            $this->cr = $cr;
        }

        public $getNome();

        public inscreveDisciplina($disciplina);
    }

    class Disciplina {
        private $alunosInscritos = array();
        private $nomeDisciplina;

        public getAlunosInscritos();
    }

    class TurmasDisciplina {
        private $turmas = array();
        private $nmax;

        public function __construct($nmax){
            $this->nmax = $nmax;
        }

        public imprimeTurmas();

        public calculaTurmas($disciplina);
    }

    $aluno1 = new Aluno("João", 8.5);
    $aluno2 = new Aluno("Ana", 9.0);
    $aluno3 = new Aluno("Maria", 9.5);

    $disciplina1 = new Disciplina("PAW");

    $turmasDisciplina = new TurmasDisciplina(2);

    $aluno1->inscreveDisciplina($disciplina1);
    $aluno2->inscreveDisciplina($disciplina1);
    $aluno3->inscreveDisciplina($disciplina1);
?>