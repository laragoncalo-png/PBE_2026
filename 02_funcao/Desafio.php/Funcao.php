<?php
function calcularPedido ($nome, $preco, $quantidade, $desconto = 0, $imposto = 0){
    $subTotal = $preco * $quantidade;
    $valorDesconto = $subTotal * ($desconto/100);
    $valorTotalComDesconto = $subTotal - $valorDesconto;
    $valorImposto = $valorTotalComDesconto * ($imposto/100);
    $totalFinal = $valorTotalComDesconto + $valorImposto;

    return[
        "nomeProduto" => $nome,
        "subTotal" => $subTotal,
        "valorDesconto" => $valorDesconto,
        "valorImposto" => $valorImposto,
        "totalFinal" => $totalFinal
    ];

}
function calcularFrete($totalFinal){
    $frete = $totalFinal * (10/100);
    $totalcomfrete = $totalFinal + $frete;

    return $totalcomfrete;
}
?>