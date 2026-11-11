<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ATIVIDADE 04 - Matrícula PowerFit</title>
</head>
<body>
    <h2>Academia PowerFit - Matrícula</h2>
    <form action="logica.php" method="POST">
        <h3>Dados do Aluno</h3>
        <label for="nome">Nome do Aluno:</label><br>
        <input type="text" name="nome" required><br><br>

        <label for="peso">Peso (kg):</label><br>
        <input type="number" name="peso" step="0.1" min="1" required><br><br>

        <label for="altura">Altura (m):</label><br>
        <input type="number" name="altura" step="0.01" min="0.5" max="2.5" required><br><br>

        <h3>Dados da Matrícula</h3>
        <label for="plano">Plano:</label><br>
        <select name="plano" required>
            <option value="">Selecione um plano</option>
            <option value="Básico">Básico (R$ 80,00)</option>
            <option value="Plus">Plus (R$ 120,00)</option>
            <option value="Premium">Premium (R$ 180,00)</option>
        </select><br><br>

        <label for="meses">Duração (meses):</label><br>
        <input type="number" name="meses" min="1" max="12" required><br><br>

        <label>Modalidades Extras (Opcional):</label><br>
        <input type="checkbox" name="modalidades[]" value="Natação">
        <label for="natacao">Natação (+ R$ 60,00)</label><br>

        <input type="checkbox" name="modalidades[]" value="Funcional">
        <label for="funcional">Funcional (+ R$ 40,00)</label><br>

        <input type="checkbox" name="modalidades[]" value="Lutas">
        <label for="lutas">Lutas (+ R$ 50,00)</label><br><br>

        <button type="submit">Gerar Matrícula</button>
    </form>
</body>
</html>