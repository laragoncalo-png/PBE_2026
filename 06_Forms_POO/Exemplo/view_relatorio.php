<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
    <h1>Produto Cadastrado</h1>
    <p>Nome: <?= $produto->getNome() ?></p>
    <p>Quantidade: <?= $produto->getQuantidade() ?></p>
    <p>Preco: <?= $produto->getPreco() ?></p>
    <p>Total em Estoque: <?= $produto->calcularTotal() ?></p>

    <a href="view.php">Cadastrar outro</a>
</body>
</html>