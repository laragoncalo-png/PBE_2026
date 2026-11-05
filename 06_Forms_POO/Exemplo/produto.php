<?php
class Produto{
    private $nome;
    private $quantidade;
    private $preco;

    public function __construct($nome, $quantidade, $preco){
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function calcularTotal(){
        return $this->preco * $this->quantidade;
    }
}
?>