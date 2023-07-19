<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Usuarios;

class PedidosController extends Controller{
    public function index($id = null){
        echo $id;
         $this->view('pedidos.php');
    }
}