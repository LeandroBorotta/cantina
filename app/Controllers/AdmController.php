<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Usuarios;
use Demo\Models\Produtos;
use Demo\Models\Adm;

class AdmController extends Controller{
    public function adm(){
        session_start();

        $adm = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
        $concluida = isset($_SESSION['concluida']) ? $_SESSION['concluida'] : false;
        $vazio = isset($_SESSION['vazia']) ? $_SESSION['vazia'] : false;

        if(!$adm){
            header("location: /exercíciosIndividuais/cantina/public/");
        }
        
        $produtos = Produtos::getProdutos();
        $valores = Adm::pegarValoresAdm();

        $entrada = number_format($valores[0]['entrada'], 2, ',', '.');
        $saida = number_format($valores[0]['saida'], 2, ',', '.');
        $caixa = number_format($valores[0]['caixa'], 2, ',', '.');

        $this->view('adm.php', [
            'produtos' => $produtos,
            'vazio' => $vazio,
            'ok' => $concluida,
            'entrada' => $entrada,
            'saida' => $saida,
            'caixa' => $caixa
        ]);

        unset($_SESSION['vazia']);
        unset($_SESSION['concluida']);
    }

    public function estoque(){
            session_start();

            $quantidade = filter_input(INPUT_POST, 'quantidade');
            $idProduto = filter_input(INPUT_POST, 'idProduto');
            $total= filter_input(INPUT_POST, 'total');
            $novoTotal = explode(" ", $total);
            $total = $novoTotal[2];
            if(empty($quantidade) && empty($total))
            {
                $_SESSION['vazia'] = 'É necessário adicionar itens a lista para finalizar uma compra';
                header("Location: /exercíciosIndividuais/cantina/public/adm");
                exit;
            }

        

            
            if(Produtos::comprarProduto($idProduto, $quantidade) && Adm::atualizarCaixa($total)){
                $_SESSION['concluida'] = 'A compra foi concluída com sucesso!!';
                header("Location: /exercíciosIndividuais/cantina/public/adm");
                exit;
            }

        header("Location: /exercíciosIndividuais/cantina/public/adm");
            exit;
    }
}