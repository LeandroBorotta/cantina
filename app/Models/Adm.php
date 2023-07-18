<?php

namespace Demo\Models;

use DatabaseConnection;
use \PDO;

class Adm extends DatabaseConnection{
    public $id;
    public $entrada;
    public $saida;
    public $caixa;

    public static function pegarValoresAdm(){
        $pdo = self::getPDO();
        $select = $pdo->prepare("SELECT * FROM adm");
        $select->execute();

        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizarCaixa($total){
        $pdo = self::getPDO();
        
        $selectSaida= $pdo->prepare("SELECT saida FROM adm");
        $selectSaida->execute();

        $AtualSaida = $selectSaida->fetch(PDO::FETCH_ASSOC);
        $AtualSaida = $AtualSaida['saida'];

        $selectCaixa= $pdo->prepare("SELECT caixa FROM adm");
        $selectCaixa->execute();

        $AtualCaixa = $selectCaixa->fetch(PDO::FETCH_ASSOC);
        $AtualCaixa = $AtualCaixa['caixa'];

        $novoCaixa = $AtualCaixa - $total;
        $novaSaida = $AtualSaida + $total;

        $atualizar = $pdo->prepare("UPDATE adm set saida=$novaSaida, caixa=$novoCaixa");
        $atualizar->execute();

        if($atualizar->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function aumentarCaixa($valor){
        $pdo = self::getPDO();
        
        $selectEntrada= $pdo->prepare("SELECT entrada FROM adm");
        $selectEntrada->execute();

        $AtualEntrada = $selectEntrada->fetch(PDO::FETCH_ASSOC);
        $AtualEntrada = $AtualEntrada['entrada'];

        $selectCaixa= $pdo->prepare("SELECT caixa FROM adm");
        $selectCaixa->execute();

        $AtualCaixa = $selectCaixa->fetch(PDO::FETCH_ASSOC);
        $AtualCaixa = $AtualCaixa['caixa'];

        $caixaFinal = $AtualCaixa + $valor;
        $entradaFinal = $AtualEntrada + $valor;

        $atualizar = $pdo->prepare("UPDATE adm set entrada=$entradaFinal, caixa=$caixaFinal ");
        $atualizar->execute();

        if($atualizar->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}