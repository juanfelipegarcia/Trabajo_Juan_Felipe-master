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
               echo "Registro Detalle exitoso";
          }
          else
          {
               echo " Error en el Registro";
          }
          
     }
}




// if (isset($_POST["Registrar"]))// si lapeticion se registra
// {

//      $Competencia->setCodigoCompetencia($_POST["CodigoCompetencia"]);//instanciar el atributo
//      $Competencia->setNombreCompetencia($_POST["NombreCompetencia"]);// instanciar  el atributo
//      //echo $Competencia->getNombreCompetencia();// verifica la instancia

//      $CrudFactura::InsertarFactura($Competencia);// llamar al metodo para  indertar

// }
// else if (isset($_POST["Modificar"]))// si lapeticion se registra
// {
//      //echo "Modificar ";
//      $Competencia->setCodigoCompetencia($_POST["CodigoCompetencia"]);//instanciar el atributo
//      $Competencia->setNombreCompetencia($_POST["NombreCompetencia"]);// instanciar  el atributo
//      //echo $Competencia->getNombreCompetencia();// verifica la instancia

//      $CrudFactura::ModificarFactura($Competencia);// llamar al metodo para  Modificar

// }

// else if ($_GET['Accion'] == "EliminarCompetencia") {
//      // echo "En Desarrollo";
//      // echo $_GET["CodigoCompetencia"];
//      $CrudFactura::EliminarFactura($_GET["CodigoCompetencia"]);
// }


?>