<?php

class Matricula {
    private $aluno;
    private $plano;
    private $meses;
    private $modalidades;
}
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
        if ($this->plano === "Básico") {
        }
    }