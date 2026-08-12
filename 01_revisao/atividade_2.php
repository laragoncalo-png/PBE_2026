<?php
$a = 3;
$b = 5;
$c = 7;

$delta= ($b ** 2)- (4 * $a *$c);
if ($delta <0 == 0) {
    echo "Não existem raízes reais.";
} elseif ($delta == 0) {
    $x =(-$b) /(2 * $a);
    echo "A única raiz é: ". $x;
}else{
    $x1 = (-$b +sqrt($delta))/(2 * $a);
    $2 = (-$b - sqrt($delta)) /(2 * $a);

    echo "Raiz 1: ". $x1. "<br>";
    echo "Raiz 2: ". $x2;
}

?>