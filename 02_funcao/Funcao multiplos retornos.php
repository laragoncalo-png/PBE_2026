<?php
function analisarNumero($numero){
    $dobro = $numero * 2;
    $triplo = $numero * 3;
    $quadrado = $numero ** 2;
    if($numero > 0){
        $situacao = "Positivo";
    } else{
        $situacao = "Negativo";
    }

    return[
        'numero' => $numero,
        'dobro' => $dobro,
        'triplo' => $triplo,
        'quadrado' => $quadrado,
        'situacao'=> $situacao
    ];
}
$numero_enviado = 15;
$resultado = analisarNumero($numero_enviado);
echo "numero: " . $resultado['numero'] . "<br>";
echo "dobro: " . $resultado['dobro'] . "<br> ";
echo "triplo: ". $resultado['triplo'] . "<br>";
echo "quadrado:" . $resultado['quadrado'] . "<br>";
echo "situacao: ". $resultado['situacao'] . "<br>";
?>
