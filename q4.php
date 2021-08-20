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

        public imprimeTurmas();

        public calculaTurmas($disciplina);
    }
?>