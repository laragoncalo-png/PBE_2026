<?php
    $nome = $POST['nome'];
    $salario_bruto = $_POST['salario_bruto'];
    $horas_extras = $_POST['horas_extras'];
    $beneficio = $_POST['beneficio'];
    $desconto = $_POST['desconto'];
   
echo $nome . "<br>";
echo $salario_bruto . "<br>";
echo $horas_extras . "<br>";
echo $beneficio . "<br>";
echo $desconto . "<br>";

$valor_hora = $salario_bruto / 160;
$valor_hora_extra = $valor_hora * 1.5;
$valor_total_horas_extras = $horas_extras * $valor_hora_extras 
$salario_liquido = $salario_bruto_sem_descontos - $impostos
if($salario_bruto_sem_descontos >=5000){
    $imposto = $salario_bruto_sem_descontos * 10/100;
}elseif($salario_bruto_sem_descontos >=3000){
    $imposto = $salario_bruto_sem_descontos * 5/100;
}else{
    $imposto = 0;
}



if($salario)


?>