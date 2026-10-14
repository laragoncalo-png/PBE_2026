<?php
Class Carro{
    private $modelo;
    private $consumo;
    private $tanque;

    public function_construct($modelo, $consumo, $tanque){
        $this->modelo=$modelo;
        $this->consumo=$consumo;
        $this->tanque=$tanque;
    }

    public function abastecer($litros){
        if($litros > 0 ){
            $this->tanque += $litros;

            echo "Foram abastecidos $litros litros! <br>";
            
        }else{
            echo "Quantidade de combustível inválida! <br>";
        }
    }
}

public function dirigir($km){
    if($km <= 0){
        echo "Distancia inválida! <br>";
        return
    }
}

$necessario = $km / $this->consumo;
    if($necessario <= $this->tanque){
        $this->tanque -= $necessario;
        echo"O carro percorreu $km km! <br>";

    }
    else{
        echo"Combustível insuficiente para percorrer $km <br>";
    }
    public function exibir_info(){
        echo"Modelo: $this->modelo  <br>";
        echo"Consumo: $this->consumo <br>";
        echo"Combustível no tanque: $this->tanque litros <br>";
    }

    $carro = new Carro("Toyota Corolla");

    $carro->abastecer(20);
    $carro->dirigir(100);
    $carro->exibir_info();
?>