<?php
class Filme{
    private $titulo;
    private $genero;
    private $duracao;
    private $assistido;

    public function __construct($titulo, $genero, $duracao, $assistido){
        $this->titulo=$titulo;
        $this->genero=$genero;
        $this->duracao=$duracao;
        $this->assistido=$assistido;
    }

    public function titulo(){
        $this->titulo = $titulo;
    }

    public function genero(){
        $this->genero = $genero;
    }

    public function duracao(){
        $this->duracao = $duracao;
    }

    public function assistido(){
        $this->assistido = $assistido;
    }
}

$filme1 = new Filme("Matrix");
$filme2 = new Filme("Harry Potter");


?>