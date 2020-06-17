<?php

class CrudProducto{

     public function __construct(){}

     public function InsertarProducto($Producto){
          $Db = Db::Conectar();

          $Insert = $Db->prepare('INSERT INTO producto VALUES(:IdProducto,:Producto,:Precio)');
          $Insert->bindValue('IdProducto', $Producto->getIdProducto());
          $Insert->bindValue('Producto', $Producto->getProducto());
          $Insert->bindValue('Precio', $Producto->getPrecio());
          try {
               $Insert->execute();//ejecutar el insert
               ?>
               <script>
               alert("Registro de producto exitoso");
               document.location.href="../Vista/CrearProducto.php";
               </script>
               <?php
          } catch (Exception $e) {
               echo $e->getMessage();//Mostrar errores en la insercion
               die();
          }
     }

     public function ListarProducto(){
          $Db = Db::Conectar();
          $ListaProducto = [];
          $Sql = $Db->query('SELECT * FROM producto');
          $Sql->execute();

          foreach($Sql->fetchAll() as $Producto){
               $MyProducto = new Producto();

               $MyProducto->setIdProducto($Producto['IdProducto']);
               $MyProducto->setProducto($Producto['Producto']);
               $MyProducto->setPrecio($Producto['Precio']);

               $ListaProducto[]=$MyProducto;
          }
          return $ListaProducto;
     }

     public function ObtenerProducto($IdProducto){
          $Db = Db::Conectar();
          $Sql = $Db->prepare('SELECT * FROM producto WHERE IdProducto=:IdProducto');
          $Sql->bindValue('IdProducto',$IdProducto);
          $MyProducto = new Producto();

          try {
               $Sql->execute();
               $Producto = $Sql->fetch();
               $MyProducto->setIdProducto($Producto['IdProducto']);
               $MyProducto->setProducto($Producto['Producto']);
               $MyProducto->setPrecio($Producto['Precio']);

          } catch (Exception $e) {
               echo $e->getMessage();//Mostrar errores en la modificacion
               die();
          }
          return $MyProducto;

     }

     public function ModificarProducto($Producto){
          $Db = Db::Conectar();
          $Sql = $Db->prepare('UPDATE producto SET Producto=:Producto, Precio=:Precio WHERE IdProducto=:IdProducto');
          $Sql->bindValue('IdProducto', $Producto->getIdProducto());
          $Sql->bindValue('Producto', $Producto->getProducto());
          $Sql->bindValue('Precio', $Producto->getPrecio());

          try {
               $Sql->execute();//ejecutar el insert
               ?>
               <script>
               alert("Modificacion Producto Exitoso");
               document.location.href="../Vista/ListarProducto.php";
               </script>
               <?php
          } catch (Exception $e) {
               echo $e->getMessage();//Mostrar errores en la insercion
               die();
          }
     }

     public function EliminarProducto($IdProducto){
          $Db = Db::Conectar();
          $Sql = $Db->prepare('DELETE FROM producto WHERE IdProducto=:IdProducto');
          $Sql->bindValue('IdProducto',$IdProducto);

          try {
               $Sql->execute();//ejecutar el insert
               ?>
               <script>
               alert("Eliminacion Producto exitosa");
               document.location.href="../Vista/ListarProducto.php";
               </script>
               <?php
          } catch (Exception $e) {
               //echo $e->getMessage();//Mostrar errores en la insercion
               ?>
               <script>
               alert("No se puede elimitar El PRODUCTO, este  esta  siendo utilizada en una  o mas FACTURAS");
               document.location.href="../Vista/ListarProducto.php";
               </script>
               <?php
               die();
          }

     }
}

?>