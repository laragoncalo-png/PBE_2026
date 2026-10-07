<?php

class Livro
{
    public $titulo;
    public $autor;
    public $paginas;
    public $anoPublicacao;

    function __construct($titulo, $autor, $paginas, $anoPublicacao = "Desconhecido")
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
        $this->anoPublicacao = $anoPublicacao;
    }

    function exibirDetalhes()
    {
        echo "Título: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "Páginas: " . $this->paginas . "<br>";
        echo "Ano de publicação: " . $this->anoPublicacao . "<br>";
        echo "<hr>";
    }
}

$livro1 = new Livro(
    "Lugar Feliz",
    "Emily Henry",
    406,
    2023
);

$livro2 = new Livro(
    "O Pequeno Príncipe",
    "Antoine de Saint-Exupéry",
    96
);

$livro1->exibirDetalhes();
$livro2->exibirDetalhes();

?>
