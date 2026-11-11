<?php

class Aluno {
    private $nome;
    private $peso;
    private $altura;

    public function __construct($nome, $peso, $altura){
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function getNome(){
        return $this->nome;
    }

    public function calcularIMC(){
        return $this->peso / ($this->altura * $this->altura);
    }

    public function classificarIMC(){
        $imc = $this->calcularIMC();
        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25.0) {
            return "Peso normal";
        } elseif ($imc < 30.0) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }
}
?>