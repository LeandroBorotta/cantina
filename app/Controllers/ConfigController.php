<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;
use Demo\Models\Usuarios;

class ConfigController extends Controller{

    public function user($id = null){
        session_start();

        $logado = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : false; 
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : false;
        $exito = isset($_SESSION['atualizado']) ? $_SESSION['atualizado'] : false; 
        
        $userLogado = Usuarios::getUserByEmail($email);

        if(!$logado){
            header("Location: /exercíciosIndividuais/cantina/public/");
            exit;
        }
        
        $this->view('config.php',[
            'logado' => $userLogado,
            'ok' => $exito
        ]);

        unset($_SESSION['atualizado']);
    }

    public function userAction(){
        session_start();

        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'nome');
        $ra = filter_input(INPUT_POST, 'ra');
        $ano = filter_input(INPUT_POST, 'ano');
        
       if(Usuarios::atualizarUser($id, $nome, $ra, $ano)){
            header("Location: /exercíciosIndividuais/cantina/public/config/$id");
            exit;
       }

       $_SESSION['atualizado'] = 'Seu perfil foi atualizado com sucesso!!';
       header("Location: /exercíciosIndividuais/cantina/public/config/$id");
       exit;
    }
}