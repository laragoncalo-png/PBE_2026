<?php

require_once "Aluno.php";

$nome = $_POST['nome'];
$turma = $_POST['turma'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];
$faltas = $_POST['faltas'];

$aluno = new Aluno($nome, $turma, $nota1, $nota2, $nota3, $faltas);

require_once "view_relatorio.php";
?>