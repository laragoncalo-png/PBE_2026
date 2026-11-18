<?php

class Matricula {
    private Aluno $aluno;
    private $plano;
    private $meses;
    private $modalidades;

    public function __construct(Aluno $aluno, $plano, $meses, $modalidades){
        $this->aluno = $aluno;
        $this->plano = $plano;
        $this->meses = $meses;
        $this->modalidades = $modalidades;
    }

    public function getAluno(): Aluno {
        return $this->aluno;
    }

    public function getPlano(){
        return $this->plano;
    }

    public function getMeses(){
        return $this->meses;
    }

    public function getModalidades(){
        return $this->modalidades;
    }

    public function calcularValorPlano(){
        if ($this->plano == "Básico") {
            return 80.00;
        } elseif ($this->plano == "Plus") {
            return 120.00;
        } else {
            return 180.00;
        }
    }

    public function calcularValorModalidade($modalidade){
        if ($modalidade === "Natação") {
            return 60.00;
        } elseif ($modalidade == "Funcional") {
            return 40.00;
        } elseif ($modalidade == "Lutas") {
            return 50.00;
        }
        return 0.00;
    }

    public function calcularMensalidade(){
        $totalMensal = $this->calcularValorPlano();

        foreach ($this->modalidades as $modalidade) {
            $totalMensal += $this->calcularValorModalidade($modalidade);
        }
        return $totalMensal;
    }

    public function calcularPercentualDesconto(){
        if ($this->meses >= 12) {
            return 20;
        } elseif ($this->meses >= 6) {
            return 10;
        }
        return 0;
    }

    public function calcularSubtotal(){
        return $this->calcularMensalidade() * $this->meses;
    }

    public function calcularDesconto(){
        return $this->calcularSubtotal() * ($this->calcularPercentualDesconto() / 100);
    }

    public function calcularTotal(){
        return $this->calcularSubtotal() - $this->calcularDesconto();
    }
}