<?php
$idades = [5,10,15,16,17,14,18,19];
$contador = 0;
$media = 0;
$soma = 0;


foreach ($idades as $idade){
    if($idade >= 18 ){
        $contador = $contador + 1;
    };
    $soma = $soma + $idade;
    $media = $soma / 10;
}
echo "A quantidade maiores são $contador e média $media"
?>