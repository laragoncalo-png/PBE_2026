<?php

class Pedido
{
    public $numero;
    public $cliente;
    public $valor;
    public $status;

    function adicionarItem($valor){
        if($this->status == "Aguardando"){
            $this->valor = $this->valor + $valor;
    }else{
        echo"Não é possivel adicionar itens.
            O pedido está $this->status<br>";
}
}
    function cancelar(){
        $this->status = "Cancelado";
        echo "Status alterado para $this->status <br>";
    }

    function finalizar(){
        $this->status = "Finalizado";
        echo "Status alterado para $this->status <br>";
    }

    function exibirResumo(){
        echo "Número: " . $this->numero . "<br>";
        echo "Cliente: " . $this->cliente . "<br>";
        echo "Valor: R$ " . number_format($this->valor, 2, ",", ".") . "<br>";
        echo "Status: " . $this->status . "<br><br>";
    }
}



$pedido1 = new Pedido();

$pedido1->numero = 101;
$pedido1->cliente = "João";
$pedido1->valor = 50.00;
$pedido1->status = "Aguardando";

$pedido1->adicionarItem(20.00);
$pedido1->finalizar();
$pedido1->exibirResumo();
$pedido2 = new Pedido();

$pedido2->numero = 102;
$pedido2->cliente = "Maria";
$pedido2->valor = 80.00;
$pedido2->status = "Aguardando";

$pedido2->adicionarItem(30.00);
$pedido2->cancelar();
$pedido2->exibirResumo();

?>
