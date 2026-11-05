<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Escolar</title>
</head>
<body>
    <h1>Boletim Escolar</h1>

    <form action="logica.php" method="POST">

        <label>Nome do aluno:</label>
        <input type="text" name="nome" required>
        <br>

        <label>Turma:</label>
        <select name="turma" required>
            <option value="1º IDS">1º IDS</option>
            <option value="2º IDS">2º IDS</option>
            <option value="3º IDS">3º IDS</option>
        </select>
        <br>

        <label>Nota 1:</label>
        <input type="number" name="nota1" min="0" max="10" step="0.1" required>
        <br>

        <label>Nota 2:</label>
        <input type="number" name="nota2" min="0" max="10" step="0.1" required>
        <br>

        <label>Nota 3:</label>
        <input type="number" name="nota3" min="0" max="10" step="0.1" required>
        <br>

        <label>Faltas:</label>
        <input type="number" name="faltas" min="0" max="80" required>
        <br>

        <button type="submit">Gerar Boletim</button>

    </form>
</body>
</html>
