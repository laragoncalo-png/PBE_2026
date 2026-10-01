
<?php
class Celular{
    public $marca;
    public $modelo;
    public $cor;
    public $bateria;
    public $ligado;

    function ligar(){
        $this->ligado = true;
        echo "O celular foi ligado";
    }

    function desligar(){
        $this->ligado = false;
        echo "O celular foi desligado <br>";
    }

    function usar($consumir){
        $this->bateria = $this->bateria - $consumir;
        if($this->bateria <0){
            $this->bateria = 0;
        }
        
        echo "A bateria foi consumida em $consumir <br>";
        echo "Sobrando um total de $this->bateria";
    }

    function carregar($carga){
        $this->bateria = $this->bateria + $carga;
        if($this->bateria > 100){
            $this->bateria = 100;
        }

        echo "A bateria foi CARREGADA em $carga <br>";
        echo " Aumentando a bateria para $this->bateria <br>";
    }
}

$celular1 = new Celular();

$celular1->marca = "Apple";
$celular1->modelo = "17 Pro Max";
$celular1->cor = "Laranja";
$celular1->bateria = 50;
$celular1->ligado = true;

echo "Marca: $celular1->marca <br>";
echo "Modelo: $celular1->modelo <br>";
echo "Cor: $celular1->cor <br>";
echo "Bateria: $celular1->bateria <br>";
echo "Ligado: $celular1->ligado <br>";

$celular1->carregar(33);
$celular1->carregar(12);
$celular1->usar(25);
$celular1->desligar();


$celular2 = new Celular();

$celular2->marca = "Samsung";
$celular2->modelo = "A56";
$celular2->cor = "Chumbo";
$celular2->bateria = 50;
$celular2->ligado = true;

echo "Marca: $celular2->marca <br>";
echo "Modelo: $celular2->modelo <br>";
echo "Cor: $celular2->cor <br>";
echo "Bateria: $celular2->bateria <br>";
echo "Ligado: $celular2->ligado <br>";

$celular2->carregar(33);
$celular2->carregar(12);
$celular2->usar(25);
$celular2->desligar();


?>