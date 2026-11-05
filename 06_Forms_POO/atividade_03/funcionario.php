<?php

class Funcionario {
    private $nome;
    private $cargo;
    private $horasExtras;
    private $valeTransporte;
    private $salarioBase;

    public function __construct($nome, $cargo, $horasExtras, $valeTransporte) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->horasExtras = $horasExtras;
        $this->valeTransporte = $valeTransporte;

        $this->definirSalarioBase();
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getHorasExtras() {
        return $this->horasExtras;
    }

    public function getSalarioBase() {
        return $this->salarioBase;
    }

    public function definirSalarioBase() {
        if ($this->cargo == "Auxiliar") {
            $this->salarioBase = 2200;
        } elseif ($this->cargo == "Técnico") {
            $this->salarioBase = 3520;
        } else {
            $this->salarioBase = 5500;
        }
    }

    public function calcularHorasExtras() {
        $valorHora = $this->salarioBase / 220;
        return $valorHora * 1.5 * $this->horasExtras;
    }

    public function calcularSalarioBruto() {
        return $this->salarioBase + $this->calcularHorasExtras();
    }

    public function calcularPercentualINSS() {
        $bruto = $this->calcularSalarioBruto();

        if ($bruto <= 2500) {
            return 8;
        } elseif ($bruto <= 5000) {
            return 10;
        } else {
            return 12;
        }
    }

    public function calcularINSS() {
        return $this->calcularSalarioBruto()
            * $this->calcularPercentualINSS() / 100;
    }

    public function calcularValeTransporte() {
        if ($this->valeTransporte == "Sim") {
            return $this->salarioBase * 0.06;
        } else {
            return 0;
        }
    }

    public function calcularSalarioLiquido() {
        return $this->calcularSalarioBruto()
            - $this->calcularINSS()
            - $this->calcularValeTransporte();
    }
}

?>
