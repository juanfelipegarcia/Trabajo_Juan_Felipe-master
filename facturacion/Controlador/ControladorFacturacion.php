<?php


require_once('../../Conexion.php');
require_once('../Modelo/Factura.php');// vincular la clase
require_once('../Modelo/DetalleFactura.php');
require_once('../Modelo/CrudFactura.php');
require_once('../Modelo/CrudDetalleFactura.php');


$Factura = new Factura(); // creal el objeto competencia
$CrudFactura = new CrudFactura();
$DetalleFactura = new DetalleFactura();
$CrudDetalleFactura = new CrudDetalleFactura();

//echo $CodigoFacturaGenerado;



if (isset($_POST["Registrar"])){// si lapeticion se registra

     $Factura->setIdCliente($_POST["IdCliente"]);
     $CodigoFacturaGenerado=$CrudFactura::InsertarFactura($Factura);

     if($CodigoFacturaGenerado>-1){

          $ProductosAgregar = $_POST["ProductosAgregados"];
          $RegistroExitoso = 0;

          for($ConsecutivoProducto=1;$ConsecutivoProducto<=$ProductosAgregar;$ConsecutivoProducto++)
          {
               $DetalleFactura->setIdFactura($CodigoFacturaGenerado);
               $CodigoProducto = "IdProducto".$ConsecutivoProducto; 
               if(isset($_POST[$CodigoProducto]))
               {

                    $DetalleFactura->setIdProducto($_POST[$CodigoProducto]);
                    $CantidadProducto = "CantidadProducto".$ConsecutivoProducto;
                    $DetalleFactura->setCantidad($_POST[$CantidadProducto]);
                    $PrecioProducto= "PrecioProducto".$ConsecutivoProducto;
                    $DetalleFactura->setValorUnitario($_POST[$PrecioProducto]);
                    $ValorDetalle = "ValorDetalle".$ConsecutivoProducto;
                    $DetalleFactura->setValorDetalle($_POST[$CantidadProducto]*$_POST[$PrecioProducto]);

                    $RegistroExitoso =($CrudDetalleFactura::InsertarDetalleFactura($DetalleFactura));
               }
          }
          if ($RegistroExitoso==1) {

               ?>
               <script>
          //header("location:../../index.php");
               alert("Registro Detalle exitoso");
               document.location.href="../Vista/IngresarFactura.php";
               </script>
               <?php
               //echo "Registro Detalle exitoso";
          }
          else
          {
               ?>
               <script>
               alert("Error en el Registro");
               document.location.href="../Vista/IngresarFactura.php";
               </script>
               <?php
               //echo " Error en el Registro";
          }
          
     }
}

?>