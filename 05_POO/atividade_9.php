<?php

class Produto
{
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function vender($quantidade){
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;

            echo "Venda realizada com sucesso!<br>";
            echo "Quantidade vendida: " . $quantidade . "<br>";
        } else {
            echo "Estoque insuficiente para realizar a venda.<br>";
        }
    }

    public function reajustarPreco($percentual){
        $this->preco += $this->preco * ($percentual / 100);

        echo "Preço reajustado com sucesso!<br>";
    }

    public function exibirInfo(){
        echo "Produto: " . $this->nome . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
        echo "Estoque: " . $this->estoque . " unidades<br>";
    }
}

$produto = new Produto("Notebook", 2500, 10);
$produto->exibirInfo();
echo "<br>";
$produto->vender(3);
echo "<br>";
$produto->reajustarPreco(10);
echo "<br>";
$produto->exibirInfo();

?>