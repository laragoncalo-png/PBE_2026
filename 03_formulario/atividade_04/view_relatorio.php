<body>
<html>
    <h1>Resultado do Aluno</h1>
    <p><B>Nome: </b> <?= $nome ?> </p>
    <p><B>Nota 1: </b> <?= $nota 1 ?> </p>
    <p><B>Nota 2: </b> <?= $nota 2?> </p>
    <p><B>Nota 3: </b> <?= $nome 3 ?> </p>

    <?php if($media >= 7): ?>
        <p>Aprovado !!</p>
    <?php else: ?>
        <p>Reprovado</p>
    <?php endif ?>

    <?php if($media == 10): ?>
        <p>Você Atingiu a nota máxima!!</p>
    <?php endif ?>
</body>
</html>