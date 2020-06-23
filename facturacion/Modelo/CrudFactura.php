<?php

class CrudFactura{
     public function __construct(){}
 
     public function InsertarFactura($Factura){
          $CodigoFacturaGenerado = -1;
          $Db = Db::Conectar();
          $Sql = $Db->prepare('INSERT INTO facturas VALUES(NULL,
          :IdCliente,NOW())');
          $Sql->bindValue('IdCliente',$Factura->getIdCliente());
          try{
               $Sql->execute(); //Ejecutar la inserción
               //echo "Factura Generada";
               
               ?>
               <script>
               
               alert("Factura Generada");
               </script>
               <?php
               $CodigoFacturaGenerado = $Db->lastInsertId();//Consultar el último Id Insertado
          }
          catch(Exception $e)
          {
               echo $e->getMessage();
               die();
          }
         return $CodigoFacturaGenerado; //Retornar el Id Insertado
     }

     public function ListarFactura(){
          $Db = Db::Conectar();
          $ListaFactura = [];
          $Sql = $Db->query('SELECT facturas.IdFactura, empresa.Empresa, facturas.FechaFactura FROM facturas INNER JOIN empresa ON empresa.IdEmpresa=facturas.IdCliente');
          $Sql->execute();

          foreach($Sql->fetchAll() as $Factura){
               $MyFactura = new Factura();

               $MyFactura->setIdFactura($Factura['IdFactura']);
               $MyFactura->setIdCliente($Factura['Empresa']);
               $MyFactura->setFechaFactura($Factura['FechaFactura']);

               $ListaFactura[]=$MyFactura;
          }
          return $ListaFactura;
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
}

?>