<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;
use Demo\Models\Usuarios;

class DefaultController extends Controller
{
    public function home()
    {   
        session_start();

        $pesquisa = isset($_GET['search']) ? $_GET['search'] : false; 
        $logado = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : false; 
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : false; 
        
        $userLogado = Usuarios::getUserByEmail($email);
        $pesquisa = Produtos::getProdutosBySearch($pesquisa);
        $produtos = Produtos::getProdutos();
        $this->view('index.php', [
            'produtos' => $pesquisa,
            'user' => $logado,
            'logado' => $userLogado
        ]);
		
    }

    public function sair()
    {
        session_start();

        unset($_SESSION['userLogado']);
        unset($_SESSION['isAdmin']);
        unset($_SESSION['email']);
        header("Location: /exercíciosIndividuais/cantina/public/");
        exit;
    }

}