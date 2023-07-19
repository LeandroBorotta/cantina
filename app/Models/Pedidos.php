<?php

namespace Demo\Models;

use DatabaseConnection;
use \PDO;

class Pedidos extends DatabaseConnection{
    private $id;
    private $id_user;
    private $produto;
    private $quantidade;
    private $valorFinal;

    public static function pegarTodosPedidos(){
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM pedidos");
        $select->execute();

        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function pegarPedidosPorId($id){
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM pedidos WHERE id_user = :id");
        $select->bindValue(':id', $id, PDO::PARAM_INT);
        $select->execute();
    
        if($select->rowCount() > 0){
            return $select->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    
    public static function adicionarPedido($id_user, $produtos, $quantidade, $nomeUser, $valorFinal){
        $pdo = self::getPDO();
        $add = $pdo->prepare("INSERT INTO pedidos (id_user, produto, quantidade, valorFinal, nome) VALUES (:id_user, :produto, :quantidade, :valorFinal, :nome)");
        $add->bindValue(':id_user', $id_user);
        $add->bindValue(':produto', $produtos);
        $add->bindValue(':quantidade', $quantidade);
        $add->bindValue(':valorFinal', $valorFinal);
        $add->bindValue(':nome', $nomeUser);
    
        if ($add->execute()) {
            return true;
        }
    
        return false;
    }
    

    public static function apagarPedido($id){
        $pdo = self::getPDO();
        $delete = $pdo->prepare("DELETE FROM pedidos WHERE id = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
    
        if($delete->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }    
}