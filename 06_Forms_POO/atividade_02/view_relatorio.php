<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Escolar</title>
</head>
<body>
    <h1>Boletim Escolar</h1>

    <p>Nome: <?= $aluno->getNome() ?></p>
    <p>Turma: <?= $aluno->getTurma() ?></p>

    <table widthborder="1"></table>
        <tr>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Média</th>
        </tr>

        <tr>
            <td><?= $aluno->getNota1() ?></td>
            <td><?= $aluno->getNota2() ?></td>
            <td><?= $aluno->getNota3() ?></td>
            <td><?= number_format($aluno->calcularMedia(), 1, ',', '.') ?></td>
        </tr>
    </table>

    <p>Faltas: <?= $aluno->getFaltas() ?></p>

    <p>Frequência: <?= number_format($aluno->calcularFrequencia(), 1, ',', '.') ?>%</p>

    <h2><?= $aluno->verificarSituacao() ?></h2>

    <?php if ($aluno->verificarSituacao() == "Aprovado") { ?>

        <p>Parabéns, continue assim!</p>

    <?php } else { ?>

        <p>Atenção: procure o professor para saber os próximos passos.</p>

    <?php } ?>

    <a href="view.php">Cadastrar outro aluno</a>

</body>
</html>
