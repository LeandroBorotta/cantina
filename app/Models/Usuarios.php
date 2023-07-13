<?php

namespace Demo\Models;

use DatabaseConnection;
use \PDO;

class Usuarios extends DatabaseConnection{

    public static function novoUsuario($nome, $ra, $anoEscolar, $email, $senha){
        $pdo = self::getPDO();
        $add = $pdo->prepare("INSERT INTO usuarios (nome, RA, anoEscolar, email, senha) VALUES (:nome, :ra, :anoEscolar, :email, :senha)");
        $add->bindValue(':nome', $nome);
        $add->bindValue(':ra', $ra);
        $add->bindValue(':anoEscolar', $anoEscolar);
        $add->bindValue(':email', $email);
        $add->bindValue(':senha', $senha);

        $add->execute();

        if($add->fetchAll(PDO::FETCH_ASSOC) > 0){
            return true;
        }

        return false;
    }

    public static function emailCadastrado($email) {
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $select->bindValue(':email', $email);
        $select->execute();
    
        $result = $select->fetchAll(PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return true;
        }
    
        return false;
    }

    public static function verificarUsuario($email, $senha){
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha");
        $select->bindValue(':email', $email);
        $select->bindValue(':senha', $senha);
        $select->execute();
    
        if($select->rowCount() > 0){
            return true;
        }
    
        return false;
    }
    
    public static function verificarHash(string $email){
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
        $select->bindValue(':email', $email);
        $select->execute();

        $usuario =  $select->fetchAll(PDO::FETCH_ASSOC);;

        return $usuario;
    }

    public static function verificarAdm($email, $senha)
    {
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND adm = 1");
        $select->bindValue(':email', $email);
        $select->bindValue(':senha', $senha);
        $select->execute();
    
        if ($select->rowCount() > 0) {
            return true;
        }
    
        return false;
    }
}