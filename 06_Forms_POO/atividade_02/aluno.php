<?php
class Aluno {
    private $nome;
    private $turma;
    private $nota1;
    private $nota2;
    private $nota3;
    private $faltas;

    public function __construct($nome, $turma, $nota1, $nota2, $nota3, $faltas) {
        $this->nome = $nome;
        $this->turma = $turma;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
        $this->faltas = $faltas;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function getNota1() {
        return $this->nota1;
    }

    public function getNota2() {
        return $this->nota2;
    }

    public function getNota3() {
        return $this->nota3;
    }

    public function getFaltas() {
        return $this->faltas;
    }

    public function calcularMedia() {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function calcularFrequencia() {
        return ((80 - $this->faltas) / 80) * 100;
    }

    public function verificarSituacao() {
        if ($this->calcularFrequencia() < 75) {
            return "Reprovado por falta";
        } elseif ($this->calcularMedia() >= 7) {
            return "Aprovado";
        } elseif ($this->calcularMedia() >= 5) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }
}
?>
