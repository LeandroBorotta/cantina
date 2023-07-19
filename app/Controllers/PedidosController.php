<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Usuarios;
use Demo\Models\Pedidos;

class PedidosController extends Controller{
    public function index($id = null){
        session_start();

        $logado = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : false; 
        $pedidos = Pedidos::pegarPedidosPorId($id);
        
        if(!$logado){
            header("Location: /exercíciosIndividuais/cantina/public/login");
            exit;
        }

        
         $this->view('pedidos.php',[
            'pedidos' => $pedidos
         ]);
    }
}