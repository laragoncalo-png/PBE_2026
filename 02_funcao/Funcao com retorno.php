<?php
$idade1 = 15;
$idade2 = 18;
$idade3 = 25;

function verificaIdade($idade){
    if($idade >= 18)
        return "Maior de idade";
    elseif($idade < 18)
        return "Menor de idade";

}

$resposta1 = verificaIdade($idade1);
echo $resposta;

$resposta2 = verificaIdade($idade1);
echo $resposta;

$resposta3 = verificaIdade($idade1);
echo $resposta;

?>

