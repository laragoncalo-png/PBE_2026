<?php
require_once "aluno.php";
require_once "matricula.php";

$nome = $_POST['nome'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$plano = $_POST['plano'];
$meses = $_POST['meses'];

$modalidades = [];
if (isset($_POST["modalidades"]) && is_array($_POST["modalidades"])) {
    $modalidades = $_POST["modalidades"];
}

$aluno = new Aluno($nome, $peso, $altura);

$matricula = new Matricula($aluno, $plano, $meses, $modalidades);

require_once "view_relatorio.php";