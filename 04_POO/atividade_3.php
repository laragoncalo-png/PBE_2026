<?php

class Aula
{
 
    public $disciplina;
    public $professor;
    public $duracao;
    public $numeroSala;
    public $bloco;

    function exibirInformacoes()
    {
        echo "Disciplina: ". $this->disciplina. "<br>";
        echo "Professor: ". $this->professor ."<br>";
        echo "Duração: ". $this->duracao ." horas<br>";
        echo "Número da sala: " .$this->numeroSala . "<br>";
        echo "Bloco: " .$this->bloco."<br><br>";
    }

    
    function trocarProfessor($novoProfessor){
        $this->professor = $novoProfessor;
        echo"O novo professor é $this->professor <br>";
    }

   function alterarLocal($n_sala, $bloco){
        $this->numeroSala = $n_sala;
        $this->bloco = $bloco;

        echo "O novo local é $this->bloco $this->numeroSala<br> ";
    }
}



$aula1 = new Aula();
$aula1->disciplina = "Programação";
$aula1->professor = "Carlos";
$aula1->duracao = 2;
$aula1->numeroSala = 10;
$aula1->bloco = "A";


$aula1->exibirInformacoes();

$aula1->trocarProfessor("Marcos");
$aula1->alterarLocal(12, "B");
$aula1->exibirInformacoes();



$aula2 = new Aula();

$aula2->disciplina = "Banco de Dados";
$aula2->professor = "Mariana";
$aula2->duracao = 3;
$aula2->numeroSala = 15;
$aula2->bloco = "C";

$aula2->exibirInformacoes();

$aula2->trocarProfessor("Fernanda");
$aula2->alterarLocal(20, "D");
$aula2->exibirInformacoes();

?>



