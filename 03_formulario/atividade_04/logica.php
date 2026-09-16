<?php

$nome_aluno = $_POST['nome'];
$nota_01 = $_POST['nota_01'];
$nota_02 = $_POST['nota_02'];
$nota_03 = $_POST['nota_03'];

$media = ($nota_01+$nota_02+$nota_03)/3;

if($media > 10){
    $media = 10;
}

require_once "view_relatorio.php";
?>