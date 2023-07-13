<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Usuarios;

class LoginController extends Controller
{
    public function login(){
        session_start();
        $erro = isset($_SESSION['erroLogin']) ? $_SESSION['erroLogin'] : false;

        $this->view('login.php',[
            'erro' => $erro
        ]);
        unset($_SESSION['erroLogin']);
    }

    public function loginAction()
    {
        session_start();
    
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
    
        $hash = Usuarios::verificarHash($email);

        if (!empty($hash) && password_verify($senha, $hash[0]['senha'])) {
            if ($hash[0]['adm'] == 1) {
                
                $_SESSION['isAdmin'] = true;
                header("Location: /exercíciosIndividuais/cantina/public/adm");
                exit;
            } else {
                
                $_SESSION['userLogado'] = true;
                header("Location: /exercíciosIndividuais/cantina/public/");
                exit;
            }
        } else {
            $_SESSION['erroLogin'] = 'Digite uma senha e um email que conferem';
            header("Location: /exercíciosIndividuais/cantina/public/login");
            exit;
        }
    
        $this->view('login.php');
    }


    public function cadastro(){
        session_start();
        $erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : false;

        $this->view('cadastro.php',[
            'erro' => $erro
        ]);
        unset($_SESSION['erro']);
    }

    public function cadastroAction(){
        session_start();

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ra = filter_input(INPUT_POST, 'ra', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ano = filter_input(INPUT_POST, 'ano');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        if(Usuarios::emailCadastrado($email))
        {
            $_SESSION['erro'] = 'digite um email que não esteja cadastrado';
            header("Location: /exercíciosIndividuais/cantina/public/cadastro");
            exit;
            
        }

        if(Usuarios::novoUsuario($nome, $ra, $ano, $email, $hash)){
            header("Location: /exercíciosIndividuais/cantina/public/login");
            exit;
        }else{
            header("Location: /exercíciosIndividuais/cantina/public/cadastro");
            exit;   
        }
        

        $this->view('cadastro.php');
    }
}