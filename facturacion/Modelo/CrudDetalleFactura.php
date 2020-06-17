<?php
class CrudDetalleFactura{

     public function __construct(){}

     public function InsertarDetalleFactura($DetalleFactura)
     {
          $DetalleInsertado=0;
          $Db = Db::Conectar();
          $Sql = $Db->prepare('INSERT INTO detallefacturas(IdDetalleFactura, IdFactura, IdProducto, Cantidad, ValorUnitario, ValorDetalle) VALUES(NULL,:IdFactura,:IdProducto,:Cantidad,:ValorUnitario,:ValorDetalle)');
          $Sql->bindValue('IdFactura',$DetalleFactura->getIdFactura());
          $Sql->bindValue('IdProducto',$DetalleFactura->getIdProducto());
          $Sql->bindValue('Cantidad',$DetalleFactura->getCantidad());
          $Sql->bindValue('ValorUnitario',$DetalleFactura->getValorUnitario());
          $Sql->bindValue('ValorDetalle',$DetalleFactura->getValorDetalle());
          try
          {
               $Sql->execute();//ejecutar el INSERT
               $DetalleInsertado = 1;

          }
          catch(Exception $e)
          {
          echo $e->getMessage();//Mostrar errores en la insercion.
          echo "<br>";
          //die();
          }
          return $DetalleInsertado;
     }

     public function ListarDetalleFactura()
     {
          $Db = Db::Conectar();
          $ListaDetalleFactura = [];
          $Sql = $Db->query('SELECT detallefacturas.IdDetalleFactura, detallefacturas.IdFactura, producto.Producto, detallefacturas.Cantidad, detallefacturas.ValorUnitario, detallefacturas.ValorDetalle FROM detallefacturas INNER JOIN producto ON detallefacturas.IdProducto=producto.IdProducto ');
          $Sql->execute();

          foreach($Sql->fetchAll() as $DetFactura){
               $MyDetalleFactura = new DetalleFactura();

               $MyDetalleFactura->setIdDetalleFactura($DetFactura['IdDetalleFactura']);
               $MyDetalleFactura->setIdFactura($DetFactura['IdFactura']);
               $MyDetalleFactura->setIdProducto($DetFactura['Producto']);
               $MyDetalleFactura->setCantidad($DetFactura['Cantidad']);
               $MyDetalleFactura->setValorUnitario($DetFactura['ValorUnitario']);
               $MyDetalleFactura->setValorDetalle($DetFactura['ValorDetalle']);

               $ListaDetalleFactura[]=$MyDetalleFactura;
          }
          return $ListaDetalleFactura;
     }

}


?>