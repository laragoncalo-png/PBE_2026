<?php
class Produto{
    private $nome;
    private $quantidade;
    private $preco;
   
    public function __construct($nome, $quantidade, $preco){
        $this->nome = $nome;
        $this->turma = $quantidade;
        $this->nota1 = $preco;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getTurma(){
        return $this->quantidade;
    }

    public function getNota1(){
        return $this->preco;
    }

    public function calcularTotal(){
        return $this->preco * $this->quantidade;
    }
    
    public function calcularDesconto(){
        if ($this->quantidade >= 10){
            return $this->calculatTotal() * o.10;
        }else{
            return 0;
        }
    }

    public function calculatTotalComDesconto(){
        return $this->calcularTotal() - $this->calcularDesconto();
    }

    public function verificarEstoque(){
        if ($this->quantidade <5){
            return "Estoque baixo";
        }else{
            return "Estoque normal";
        }
    }
}
?>