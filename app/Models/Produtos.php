<?php

namespace Demo\Models;

use DatabaseConnection;
use \PDO;

class Produtos extends DatabaseConnection{
    private $id;
    private $nome;
    private $preco;
    private $foto;
    private $quantidadeEstoque;

    public static function getProdutos(){
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM produtos");
        $select->execute();

        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProdutosBySearch($search = null)
    {
        $pdo = self::getPDO();
        if ($search === NULL || empty($search) || $search === 'undefined') {
            $select = $pdo->prepare("SELECT * FROM produtos");
            $select->execute();
    
            $result = $select->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $select = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE :search");
            $select->bindValue(':search', "%$search%", PDO::PARAM_STR);
            $select->execute();
            
            $result = $select->fetchAll(PDO::FETCH_ASSOC);
        }
    
        return $result;
    }

    public static function comprarProduto($id, $compra) {
        $pdo = self::getPDO();
        
        $quantidadeAtual = $pdo->prepare("SELECT quantidade FROM produtos WHERE id = :id");
        $quantidadeAtual->bindValue(':id', $id);
        $quantidadeAtual->execute();
        
        $resultado = $quantidadeAtual->fetch(PDO::FETCH_ASSOC);
        
        if (!$resultado) {

            return "Produto não encontrado.";
        }
        
        $quantidadeAtual = $resultado['quantidade'];
        
        $totalFinal = $quantidadeAtual + $compra;

        $atualizarQuantidade = $pdo->prepare("UPDATE produtos set quantidade=$totalFinal WHERE id=:id");
        $atualizarQuantidade->bindValue(':id', $id);
        $atualizarQuantidade->execute();

        if ($atualizarQuantidade->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
        
    }

    public static function venderProduto($quantidade, $id){
        $pdo = self::getPDO();
        
        $quantidadeAtual = $pdo->prepare("SELECT quantidade FROM produtos WHERE id = :id");
        $quantidadeAtual->bindValue(':id', $id);
        $quantidadeAtual->execute();
        
        $resultado = $quantidadeAtual->fetch(PDO::FETCH_ASSOC);
        
        if (!$resultado) {

            return "Produto não encontrado.";
        }

        $quantidadeAtual = $resultado['quantidade'];

        $quantidadeFinal = $quantidadeAtual - $quantidade;

        $atualizarQuantidade = $pdo->prepare("UPDATE produtos set quantidade=$quantidadeFinal WHERE id=:id");
        $atualizarQuantidade->bindValue(':id', $id);
        $atualizarQuantidade->execute();

        if ($atualizarQuantidade->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }


    }
}