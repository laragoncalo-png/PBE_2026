<!DOCTYPE html>         // Maria Clara e Lara //
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Locadora de Veículos</title>
</head>
    <body>
        <h1>Locadora de Veículos</h1>
        <h2>Dados do Cliente</h2>
        <form action="logica.php" method = "POST">
        <label for="">Nome:</label>
        <br>
        <input type="text" name="nome">
        <br><br>
        <label for="">Email</label>
        <br>
        <input type="text" email="email">
        <br>
        <h1>Dados da Locação</h1>
        <label for="">data de retirada:</label>
        <br>
        <input type="date" name="data_retirada">
        <br><br>
        <label for="">Quantidade de dias:</label>
        <br>
        <input type="number" name="qtd_dias">
        <br><br>
        <label>Categoria do veículo:</label><br>
            <select name="categoria do veículo">
                <option value="50">simples - R$50</option>
                <option value="intermediario - 100">intermediario -R$100</option>
                <option value="150">luxo - R$150</option>
            </select>
        <br><br>
                            <h1>Adicionais</h1>
                                <label for="">Seguro total(R$40,00/dia):</label><br>
                                <input type="radio" name="tipo" value="sim" min="3" required>
                                <label>sim</label>
                                    <input type="radio" name="tipo" value="não">
                                    <label>não</label>
                                    <br><br>
                                        <label for="">GPS(R$15,00/dia):</label><br>
                                        <input type="radio" name="tipo" value="sim" min="3" required>
                                        <label>sim</label>
                                            <input type="radio" name="tipo" value="não">
                                            <label>não</label>
                                            <br><br>
                                                <label for="">Cadeirinha Infantil(R$20,00/dia):</label><br>
                                                <input type="radio" name="tipo" value="sim" min="3" required>
                                                <label>sim</label>
                                                    <input type="radio" name="tipo" value="não">
                                                    <label>não</label>
                                                    <br><br>


        <button type="submit">Gerar Contrato</button>
</body>

require_once "lógica.php";
</html>
