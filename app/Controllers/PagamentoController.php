<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;

class PagamentoController extends Controller
{
    public function pagamento(){
        $this->view('pagamento.php');
    }
}