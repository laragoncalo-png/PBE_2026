<?php

class ContaBancaria{

    public $titular;
    public $saldo;

    function __construct($titular, $saldoInicial)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    function depositar($valor)
    {
        $this->saldo += $valor;
    }


    function sacar($valor)
    {
        $this->saldo -= $valor;
    }
    function exibirSaldo()
    {
        echo "Titular: " . $this->titular . "<br>";
        echo "Saldo atual: R$ " . number_format($this->saldo, 2, ',', '.') . "<br>";
    }
}

$conta = new ContaBancaria("Shannayah", 1000);
$conta->depositar(500);
$conta->sacar(200);
$conta->exibirSaldo();

?>
