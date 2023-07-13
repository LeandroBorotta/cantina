<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;

class DefaultController extends Controller
{
    public function home()
    {   
        session_start();
        $logado = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : false; 
        
        $produtos = Produtos::getProdutos();
        $this->view('index.php', [
            'produtos' => $produtos,
            'user' => $logado
        ]);
		
    }

    public function sair()
    {
        session_start();

        unset($_SESSION['userLogado']);
        unset($_SESSION['isAdmin']);
        header("Location: /exercíciosIndividuais/cantina/public/");
        exit;
    }

}