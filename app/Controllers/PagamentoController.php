<?php
namespace Demo\Controllers;

use Demo\Template\Controller;
use Demo\Models\Produtos;

class PagamentoController extends Controller
{
    

    public function pagamento(){

        $produtos = $_POST['produtos'] ?? null;
        $quantidades = $_POST['quantidades'] ?? null;

        // Verificar se os arrays estão definidos e têm a mesma quantidade de elementos
        if ($produtos !== null && $quantidades !== null && count($produtos) === count($quantidades)) {
        // Loop pelos elementos dos arrays
        for ($i = 0; $i < count($produtos); $i++) {
            $produto = json_decode($produtos[$i], true);
            $quantidade = intval($quantidades[$i]);

            // Acessar os valores individuais do produto
            $produtoId = $produto['id'];
            $produtoNome = $produto['name'];
            $produtoImg = $produto['img'];
            $produtoPreco = $produto['price'];

            // Fazer algo com os valores
            echo "Produto ID: " . $produtoId . "<br>";
            echo "Produto Nome: " . $produtoNome . "<br>";
            echo "Produto Imagem: " . $produtoImg . "<br>";
            echo "Produto Preço: " . $produtoPreco . "<br>";
            echo "Quantidade: " . $quantidade . "<br>";
            echo "<br>";
        }
        }
        $this->view('pagamento.php');
    }
}