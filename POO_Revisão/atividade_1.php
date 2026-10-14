<?php
class Aluno{
    private $nome;
    private $nota;

    public function __construct($nome, $nota=0){
        $this->nome=$nome;
        $this->nota=$nota;
    }

    public function getStatus(){
        if($this->nota = >=6)
            return "Aprovado";
    }else{
        return"Reprovado";
    }
}

$aluno1 = new Aluno("Leonardo", 10);

echo"<pre>";
print_r($aluno1);
echo"</pre>";

$aluno2 = new Aluno("Gabriel", 1);

echo"<pre>";
print_r($aluno1);
echo"</pre>";

echo $aluno2->getStatus();

?>