<?php
namespace models;

/**
   * Class model de Prospect
   * @author Christian Emanuel Molin
*/

class Prospect{

    /**
     * Código do prospect
     * @var string
     */
    public $codigo;
    /**
     * Nome do prospect
     * @var string
     */
    public $nome;
    /**
     * Email do prospect
     * @var string
     */
    public $email;
    /** 
     * Celular do prospect
     * @var string
     */
    public $celular;
    /**
     * Facebook do prosect
     * @var string
     */
    public $facebook;
    /**
     * whatsapp do prospect
     * @var boolean
     */
    public $whatsapp;
    

    /**
     * Carrega os atributos da classe usuário
     * @param string $codigo Código do prospect
     * @param string $nome Nome do prospect
     * @param string $email Email do prospect
     * @param string $celular Celular do prospect
     * @param string $facebook Facebook do prospect
     * @param string $whatsapp Whatsapp do prospect
     * @return void
     */
    public function addProspect($codigo, $nome, $email, $celular, $facebook, $whatsapp){
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->facebook = $facebook;
        $this->whatsapp = $whatsapp;

    }
}
?>