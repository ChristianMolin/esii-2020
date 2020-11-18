<?php
namespace models;

/**
   * Class model de Usuário
   * @author Christian Emanuel Molin
*/

class Usuario{

    /**
     * Login do usuário
     * @var string
     */
    public $login;
    /**
     * Nome do usuário
     * @var string
     */
    public $nome;
    /**
     * Email do usuário
     * @var string
     */
    public $email;
    /** 
     * Celular do usuário
     * @var string
     */
    public $celular;
    /**
     * Identifica se o usuário está ou não logado
     * @var boolean
     */
    public $logado;

    /**
     * Carrega os atributos da classe usuário
     * @param string $login Login do usuário
     * @param string $nome Nome do usuário
     * @param string $email Email do usuário
     * @param string $celular Celular do usuário
     * @param boolean $logado Identifica se o usuário está ou não logado
     * @return void
     */
    public function addUsuario($login, $nome, $email, $celular, $logado){
        $this->login = $login;
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->logado = $logado;

    }
}
?>