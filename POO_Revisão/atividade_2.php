<?php
class Carro{
    private $modelo;
    private $velocidade;

    public function __construct($modelo, $velocidade = 0){
        $this->modelo=$modelo;
        $this->velocidade=$velocidade;
    }

    public function acelerar (){
        $this->velocidade = 10;
    }

    public function freiar(){
        $this->velocidade -= 10;
    }

    public function velocidade(){
        echo"O carro $this->modelo está atualmente com a velocidade de $this->velocidade <br>";
    }
}
$carro = new Carro("Honda Civic", 20);
$carro->vervelocidade();

?>