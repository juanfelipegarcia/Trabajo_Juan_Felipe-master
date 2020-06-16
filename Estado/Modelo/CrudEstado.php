<?php

class CrudEstado{

     public function __construct(){}

     public function InsertarEstado($Estado){
          $Db = Db::Conectar();

          $Insert = $Db->prepare('INSERT INTO estado VALUES(:IdEstado,:Estado)');
          $Insert->bindValue('IdEstado', $Estado->getIdEstado());
          $Insert->bindValue('Estado', $Estado->getEstado());
          
          try {
               $Insert->execute();//ejecutar el insert
               ?>
               <script>
               alert("Registro exitoso");
               document.location.href="../Vista/CrearEstado.php";
               </script>
               <?php
          } catch (Exception $e) {
               echo $e->getMessage();//Mostrar errores en la insercion
               die();
          }
     }

     public function ListarEstado(){
          $Db = Db::Conectar();
          $ListaEstado = [];
          $Sql = $Db->query('SELECT * FROM estado');
          $Sql->execute();

          foreach($Sql->fetchAll() as $Estado){
               $MyEstado = new Estado();

               $MyEstado->setIdEstado($Estado['IdEstado']);
               $MyEstado->setEstado($Estado['Estado']);

               $ListaEstado[]=$MyEstado;
          }
          return $ListaEstado;
     }

     public function ObtenerEstado($IdEstado){
          $Db = Db::Conectar();
          $Sql = $Db->prepare('SELECT * FROM estado WHERE IdEstado=:IdEstado');
          $Sql->bindValue('IdEstado',$IdEstado);
          $MyEstado = new Estado();

          try {
               $Sql->execute();
               $Estado = $Sql->fetch();
               $MyEstado->setIdEstado($Estado['IdEstado']);
               $MyEstado->setEstado($Estado['Estado']);

          } catch (Exception $e) {
               echo $e->getMessage();//Mostrar errores en la modificacion
               die();
          }
          return $MyEstado;

     }

     public function ModificarEstado($Estado){
          $Db = Db::Conectar();
          $Sql = $Db->prepare('UPDATE estado SET Estado=:Estado WHERE IdEstado=:IdEstado');
          $Sql->bindValue('IdEstado', $Estado->getIdEstado());
          $Sql->bindValue('Estado', $Estado->getEstado());
         

          try {
               $Sql->execute();//ejecutar el insert
               ?>
               <script>
               alert("Modificacion Estado Exitoso");
               document.location.href="../Vista/ListarEstado.php";
               </script>
               <?php
          } catch (Exception $e) {
               echo $e->getMessage();//Mostrar errores en la insercion
               die();
          }
     }

     public function EliminarEstado($IdEstado){
          $Db = Db::Conectar();
          $Sql = $Db->prepare('DELETE FROM estado WHERE IdEstado=:IdEstado');
          $Sql->bindValue('IdEstado',$IdEstado);

          try {
               $Sql->execute();//ejecutar el insert
               ?>
               <script>
               alert("Eliminacion estado exitosa");
               document.location.href="../Vista/ListarEstado.php";
               </script>
               <?php
          } catch (Exception $e) {
               //echo $e->getMessage();//Mostrar errores en la insercion
               ?>
               <script>
               alert("No se puede elimitar El Estado, este  esta  siendo utilizada en una  o mas cotizaciones");
               document.location.href="../Vista/ListarEstado.php";
               </script>
               <?php
               die();
          }

     }
}

?>