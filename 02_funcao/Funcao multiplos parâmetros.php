<?php
$preco = 5;
$qtd = 2;
$desconto = 10;

function calcularPrecofinal($preco, $qtd, $desconto) {
    $total = $preco * $qtd;
    $totalDesconto = $total - ($total * $desconto/100);
    return "$totalDesconto";
}

$resultado = calcularPrecofinal($preco , $qtd, $desconto);
echo "Preco: $preco <br>";
echo "qtd: $qtd <br>";
echo "desconto: $desconto <br>";
echo "resultado: $resultado";
?>