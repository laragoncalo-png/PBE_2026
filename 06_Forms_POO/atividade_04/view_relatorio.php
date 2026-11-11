<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Matrícula</title>
</head>
<body>
    <h1>Contrato de Matrícula</h1>

    <p>Aluno: <?= $matricula->getAluno()->getNome() ?></p>
    <p>IMC: <?= number_format($matricula->getAluno()->calcularIMC(), 1, ',', '.') ?> 
        (<?= $matricula->getAluno()->classificarIMC() ?>)</p>

    <h3>Composição da Mensalidade</h3>
    <table widthborder="1" >
        <thead>
            <tr>
                <th>Item</th>
                <th>Valor Mensal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Plano <?= $matricula->getPlano() ?></td>
                <td>R$ <?= number_format($matricula->calcularValorPlano(), 2, ',', '.') ?></td>
            </tr>
            <?php foreach ($matricula->getModalidades() as $modalidade): ?>
                <tr>
                    <td>Modalidade Extra: <?= $modalidade ?></td>
                    <td>R$ <?= number_format($matricula->calcularValorModalidade($modalidade), 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Total da Mensalidade</td>
                <td>R$ <?= number_format($matricula->calcularMensalidade(), 2, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <h3>Resumo do Contrato</h3>
    <p>Duração: <?= $matricula->getMeses() ?> meses</p>
    <p>Subtotal: R$ <?= number_format($matricula->calcularSubtotal(), 2, ',', '.') ?></p>
    <p>Desconto (<?= $matricula->calcularPercentualDesconto() ?>%): R$ <?= number_format($matricula->calcularDesconto(), 2, ',', '.') ?> </p>

    <h2>Total do Contrato: R$ <?= number_format($matricula->calcularTotal(), 2, ',', '.') ?></h2>

    <p><?php if ($matricula->calcularPercentualDesconto() > 0): ?>
            Parabéns! Você ganhou <?= $matricula->calcularPercentualDesconto() ?>% de desconto.
        <?php else: ?>
            Dica: Fechando 6 meses ou mais você ganha desconto.
        <?php endif; ?> </p>
    <br>
</body>
</html>
