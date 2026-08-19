<?php
$frequencia1 = 90;
$media1 = 9;

echo "Leonardo - ";
if ($frequencia1 < 75) { // Frequência insuficiente
    echo "Reprovado por falta";
}
elseif ($media1 >= 7) { // Maior que 7 aprovado
    echo "Aprovado";
}
elseif ($media1 >= 5) { // Nota: entre 5 e 6.9 = recuperacao
    echo "Recuperaçõa";
}
else{ // Media insuficiente reprovado
    echo "Reprovado";
}

$frequencia2 = 90;
$media2 = 9;

echo "José - ";
if ($frequencia2 < 75) { // Frequência insuficiente
    echo "Reprovado por falta";
}
elseif ($media2 >= 7) { // Maior que 7 aprovado
    echo "Reprovado por falta";
}
elseif ($media2 >= 5) { // Nota: entre 5 e 6.9 = recuperacao
    echo "Recuperaçõa";
}
else{ // Media insuficiente reprovado
    echo "Reprovado";
}

$frequencia3 = 90;
$media3 = 9;

echo "Roberto - ";
if ($frequencia3 < 75) { // Frequência insuficiente
    echo "Recuperação";
}
elseif ($media3 >= 7) { // Maior que 7 aprovado
    echo "Aprovado";
}
elseif ($media3 >= 5) { // Nota: entre 5 e 6.9 = recuperacao
    echo "Recuperaçõa";
}
else{ // Media insuficiente reprovado
    echo "Reprovado";
}
?>