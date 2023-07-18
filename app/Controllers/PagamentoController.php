<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;
use Demo\Models\Usuarios;
use Demo\Models\Adm;

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
            'nomeUser' => $nomeUser
        ]);

    }

    public function pagamentoFinal(){
        $produtosId = $_POST['produtoId'] ?? null;
        $produtosQuantidade = $_POST['produtoQuantidade'] ?? null;
        $totalCompra = $_POST['totalCompra'] ?? null;
        

        for ($i = 0; $i < count($produtosId); $i++) {
            if(Produtos::venderProduto($produtosQuantidade[$i], $produtosId[$i]) && Adm::aumentarCaixa($totalCompra)){
                header("Location: /exercíciosIndividuais/cantina/public/");
                exit;
            }
            
        }
    
    }
}