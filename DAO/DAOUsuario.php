<?php
namespace DAO;
mysqli_report(MYSQLY_REPORT_STRICT);
require_once('../models/Usuario.php');
use model\Usuario;

/**
 * Esta classe é responsável por fazer a comunicação com o banco de dados,
 * promovendo as funções de logar e incluir novo usuário
 * @author Paulo Roberto Córdova
 *
 */
class DAOUsuario{
   /**
    * Função para fazer o login no sistema, validando os dados fornecidos pelo usuário
    * @param string $login Login do Usuário
    * @param string $senha Senha do Usuário
    * @return Usuario|Exception
    */
   public function logar($login, $senha){
      try{
         $connDB = $this->conectarBanco();
      }catch (\Exception $e){
         die($e->getMessage());
      }
      

      $usuario = new Usuario();

      $sql = $connDB->prepare("select login, nome, email, celular from usuario
                                where
                                login = ?
                                and
                                senha = ?");
      $sql->bind_param('ss', $login, $senha);
      $sql->execute();
      if(!$sql->error){
         $resultado = $sql->get_result();

         if($resultado->num_rows === 0){
            $usuario->addUsuario(null, null, null, null, FALSE);
         }else{
            while($linha = $resultado->fetch_assoc()){
               $usuari->addUsuario($linha['login'], $linha['nome'], $linha['email'], $linha['celular'], TRUE);
            }
         }
      }else{
         throw new \Exception("Erro ao executar busca com os dados fornecidos!");
      }

      $sql->close();
      $connDB->close();
   }
   /**
    * Inclui um novo usuário no banco de dados
    * @param Usuario $usuario Objeto do tipo Usuario que deverá ser cadastrado
    * @return TRUE|Exception TRUE para inclusão bem sucedida ou Exception para inclusão mal sucedida
    */
   public function incluirUsuario($nome, $email, $login, $senha){
       try {
         $connDB = $this->conectarBanco();
      } catch (\Exception $e) {
         die($e->getMessage());
      }

      $sqlInsert = $connDB->prepare("insert into usuario
                                       (nome, email, login, senha)
                                       values
                                       (?, ?, ?, ?)");
      $sqlInsert->bind_param("ssss", $nome, $email, $login, $senha);
      $sqlInsert->execute();
      if(!$sqlInsert->error){
         $retorno =  TRUE;
      }else{
         throw new \Exception("Não foi possível incluir novo usuário!");
         die;
      }
      $connDB->close();
      $sqlInsert->close();
      return $retorno;
   }
   private function conectarBanco(){
      if(!defined('DS')){
         define('DS', DIRECTORY_SEPARATOR );
      }
      if(!defined('BASE_DIR')){
         define('BASE_DIR', dirname(__FILE__).DS );
      }

      require_once(DS.'bd_config.php');

      try{
         $conn = new \MySQLi($dbhost, $user, $password, $db);
         return $conn;
      }catch(mysqli_sql_exception $e){
         throw new \Exception($e);
         die;
      }
   }
}
?>