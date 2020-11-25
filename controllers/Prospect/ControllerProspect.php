<?php
namespace controllers;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;
require_once($root .'../models/Prospect.php');

use DAO\DAOProspect;

/**
 * Esta classe serve para tratar as regras de negócio pertinentes à classe prospect.
 * Seu escopo limita-se às funções da entidade prospect
 * 
 * @author Christian Emanuel Molin
 */class ControllerProspect{
     /**
     * @param string $codigo Código do prospect
     * @param string $nome Nome do prospect
     * @param string $email Email do prospect
     * @param string $celular Celular do prospect
     * @param string $facebook Facebook do prospect
     * @param string $whatsapp Whatsapp do prospect
     * @return Prospect
      */

    public function salvarProspect($codigo, $nome, $email, $celular, $facebook, $whatsapp){
        $daoProspect = new DAOProspect();

        try{
            $prospect = $daoProspect->incluirProspect($nome, $email, $celular, $facebook, $whatsapp);
            }catch(\Exception $e){
                throw new \Exception($e->getMessage());
            }
            unset($daoProspect);
            return $prospect;

        }  
    }
     /**
      * Classe para excluir um Prospect
      */
        /**
        * @param string $codigo Código do prospect
        * @return TRUE|Exception Retorn TRUE caso a inclusão tenha sido bem sucedida
        * ou uma Exception caso não tenha
        */
    public function excluirProspect($codigo){
        $daoProspect = new DAOProspect();

        try{
            $daoProspect->excluirProspect($codigo);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
     /**
      * Classe para buscar um Prospect
      */
        /**
        * @param string $email Email do prospect
        */
      public function buscarProspect($email=null){
        $daoProspect = new DAOProspect();

        try{
            $daoProspect->buscarProspect($email=null);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

?>