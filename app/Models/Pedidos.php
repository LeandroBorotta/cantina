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
    
    public static function adicionarPedido($id_user, $produtos, $quantidade, $valorFinal){
        $pdo = self::getPDO();
        $add = $pdo->prepare("INSERT INTO pedidos (id_user, produto, quantidade, valorFinal) VALUES (:id_user, :produto, :quantidade, :valorFinal)");
        $add->bindValue(':id_user', $id_user);
        $add->bindValue(':produto', $produtos);
        $add->bindValue(':quantidade', $quantidade);
        $add->bindValue(':valorFinal', $valorFinal);
    
        if ($add->execute()) {
            return true;
        }
    
        return false;
    }
    
}