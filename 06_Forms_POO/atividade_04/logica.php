<?php
require_once "aluno.php";
require_once "matricula.php";

$nome = $_POST['nome'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$plano = $_POST['plano'];
$meses = $_POST['meses'];

$modalidades = $_POST["modalidades"] ?? [];
/* ?? vai verificar se uma variável existe e se ela não existir ele utiliza um valor padrão no lugar que é o [] */

$aluno = new Aluno($nome, $peso, $altura);

$matricula = new Matricula($aluno, $plano, $meses, $modalidades);

require_once "view_relatorio.php";