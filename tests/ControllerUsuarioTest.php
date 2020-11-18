<?php
namespace test;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../controllers/Usuario/ControllerUsuario.php');

use PHPUnit\Framework\TestCase;
use models\Usuario;
use controller\ControllerUsuario;

class ControllerUsuarioTest extends TestCase{
   /** @test */
   public function testLogar(){
      $ctrlUsuario = new ControllerUsuario();
      $usuario = new Usuario();

       try{
         $usuario->addUsuario("chris", "Christian Molin", "christianmolin51@gmail.com", "(49)99163-5527", TRUE);

         $this->assertEquals(
            $usuario,
            $ctrlUsuario->fazerLogin('chris', '123')
         );
      }
      catch(\Exception $e){
         $this->fail($e->getMessage());
      }
      unset($usuario);
      unset($daoUsuario);
   }

   public function testIncluirUsuario(){
      $ctrlUsuario = new ControllerUsuario();

      try{
         $this->assertEquals(
            TRUE,
            $ctrlUsuario->salvarUsuario("Leandro Machado", "leandro@gmail.com","(49)96632-7854", "leandro", "abc")
         );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
}
?>