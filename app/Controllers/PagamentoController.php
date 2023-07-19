<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;
use Demo\Models\Usuarios;
use Demo\Models\Adm;
use Demo\Models\Pedidos;

class PagamentoController extends Controller
{
    

    public function pagamento()
    {
        session_start();
    
        $logado = isset($_SESSION['userLogado']) ? $_SESSION['userLogado'] : false;
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : false; 
        
        
        if (!$logado) {
            header("Location: /exercíciosIndividuais/cantina/public/");
            exit;
        }

        $userLogado = Usuarios::getUserByEmail($email);
        $idUser = $userLogado['id'];
        $nomeUser = $userLogado['nome'];
        $produtosString = $_POST['produtos'] ?? null;
        $quantidadesString = $_POST['quantidades'] ?? null;
    
    
        
        if (!empty($produtosString) &&!empty($quantidadesString)) {
            $produtosArray = [];
            $quantidadesArray = [];
          
            foreach ($produtosString as $produtoString) {
               
                $produtoObjeto = json_decode($produtoString);
    
              
                if ($produtoObjeto !== null) {
                    
                    $produtosArray[] = $produtoObjeto;
                }
            }

            foreach ($quantidadesString as $produtoString) {
               
                $produtoObjeto = json_decode($produtoString);
    
              
                if ($produtoObjeto !== null) {
                    
                    $quantidadesArray[] = $produtoObjeto;
                }
            }
        } else {
            $produtosArray = [];
            $quantidadesArray = [];
        }
    
       
    
    
        $this->view('pagamento.php', [
            'quantidades' => $quantidadesArray,
            'produtos' => $produtosArray,
            'idUser' => $idUser,
            'nomeUser' => $nomeUser,
        ]);

    }

    public function pagamentoFinal(){

        $idUser = $_POST['idUser'] ?? null;
        $produtosId = $_POST['produtoId'] ?? null;
        $produtosQuantidade = $_POST['produtoQuantidade'] ?? null;
        $totalCompra = $_POST['totalCompra'] ?? null;
        $produtoNome = $_POST['produtoNome'] ?? null;
        $produtos = '';
        $quantidadeTotal = 0;

        if (count($produtosQuantidade) > 0) {
            for ($i = 0; $i < count($produtosQuantidade); $i++) {
                if (is_numeric($produtosQuantidade[$i])) {
                    $quantidadeTotal += $produtosQuantidade[$i];
                }
            }
        }else{
            $quantidadeTotal = 1;
        }

        if (count($produtoNome) > 0) {
            for ($i = 0; $i < count($produtoNome); $i++) {
                if ($i > 0) {
                    $produtos .= ', ';
                }
                $produtos .= $produtoNome[$i];
            }
        } else {
            $produtos = $produtoNome[0];
        }
        
        Pedidos::adicionarPedido($idUser, $produtos, $quantidadeTotal, $totalCompra);

        for ($i = 0; $i < count($produtosId); $i++) {
            if(Produtos::venderProduto($produtosQuantidade[$i], $produtosId[$i]) && Adm::aumentarCaixa($totalCompra)){
                header("Location: /exercíciosIndividuais/cantina/public/");
                exit;
            }
            
        }
    
    }
}