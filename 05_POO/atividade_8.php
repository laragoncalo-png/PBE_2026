<?php
Class Funcionario{
    private $nome;
    private $salario;

    public function__construct($nome, $salario = 1000){
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function aumentarSalario($percentual){
        if($percentual > 0 && $percentual <= 10){
            $aumento = $this->salario * ($percentual / 100);
        }else{
            echo "Erro: o percentual deve ser maior que 0 e menor ou igual a 10.<br>";
        }
}
    public function exibirSalario(){
        echo "Funcionario" . $this->nome.
        "Salario: R$".
        number_format($this->salario, 2, ',',',');
    }

    $func = new Funcionario("Shannayah, 3000");
    $func->aumentarSalario(10);
    $func->exibirSalario();
}