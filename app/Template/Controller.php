<?php
namespace Demo\Template;

class Controller
{
    public function view(string $diretorio, array $variaveis = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('../site/views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render($diretorio, $variaveis);
    }
}