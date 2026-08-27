<?php
require_once "funcao.php";

$resultado = calcularPedido ("Teclado", 100, 10, 5, 7);
echo "Nome:" .$resultado["nomeProduto"]."<br>";
echo "SubTotal" .$resultado['subTotal']."<br>";
echo "Desconto" .$resultado['valorDesconto']."<br>";
echo "Imposto" .$resultado['totalFinal']."<br>";
echo "Total" .$resultado['totalFinal']."<br>";

$totalcomfrete = calcularFrete($resultado['totalFinal']);
echo "Total com Frete". $totalcomfrete;
?>