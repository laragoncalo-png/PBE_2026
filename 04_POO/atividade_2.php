<?php
class Conta{
    public $titular;
    public $numero;
    public $saldo;
    public $tipo;

    function depositar($valor){
        $this->saldo = $this->saldo + $valor;
        echo "O saldo aumentou para $this->saldo";
    }

    function sacar(){
        $this->saldo = $this->saldo - $valor;
        echo "O saldo resultou em $this->saldo";
}

    function consultarSaldo(){
        echo "O valor do saldo é de $this->saldo";
    }
}

?>