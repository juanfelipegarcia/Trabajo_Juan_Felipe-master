<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}


require_once('../../conexion.php');
require_once('../../Cotizacion/Modelo/Cotizacion.php');
require_once('../../Cotizacion/Modelo/CrudCotizacion.php');
require_once('../../Empresa/Modelo/Empresa.php');
require_once('../../Empresa/Modelo/CrudEmpresa.php');
require_once('../../Estado/Modelo/Estado.php');
require_once('../../Estado/Modelo/CrudEstado.php');
require_once('../../Producto/Modelo/Producto.php');
require_once('../../Producto/Modelo/CrudProducto.php');
require_once('../../Facturacion/Modelo/Factura.php');
require_once('../../Facturacion/Modelo/CrudFactura.php');
require_once('../../Facturacion/Modelo/DetalleFactura.php');
require_once('../../Facturacion/Modelo/CrudDetalleFactura.php');

$CrudCotizacion = new CrudCotizacion();
$ListaCotizacion = $CrudCotizacion->ListarCotizacion();

$CrudEmpresa = new CrudEmpresa();
$ListaEmpresa = $CrudEmpresa->ListarEmpresa();

$CrudEstado = new CrudEstado();
$ListaEstado = $CrudEstado->ListarEstado();

$CrudProducto = new CrudProducto();
$ListaProducto = $CrudProducto->ListarProducto();

$CrudFactura = new CrudFactura();
$ListaFactura = $CrudFactura->ListarFactura();

$CrudDetalleFactura = new CrudDetalleFactura();
$ListaDetalleFactura = $CrudDetalleFactura->ListarDetalleFactura();

//var_dump($ListaCotizacion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Listar Cotizacion</title>

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
     <div class="container-fluid">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="../../Navegacion.php">Kreemo Solution System</a></h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="../../Empresa/Vista/ListarEmpresa.php">Empresas</a>
                    <a class="p-2 text-dark" href="../../Estado/Vista/ListarEstado.php">Estado</a>
                    <a class="p-2 text-dark" href="../../facturacion/Vista/ListarFactura.php">Facturas</a>
                    <a class="p-2 text-dark" href="../../Producto/Vista/ListarProducto.php">Producto</a>
               </nav>
               <a class="btn btn-outline-primary" href="../../CerrarSeccion.php">Cerrar Sesion</a>
          </div>

          <h1 align="center">LISTAS</h1>
          <div class="row">
               <div class="col-sm-6">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Cotizaciones</h5>
                         <table class="table table-bordered table-responsive">
                              <thead class="thead-dark">
                                   <tr>
                                   <th scope="col">Cotización</th>
                                   <th scope="col">Empresa</th>
                                   <th scope="col">Estado</th>
                                   <th scope="col">Metros <sup>3</sup></th>
                                   <th scope="col">Valor Metro <sup>3</sup></th>
                                   <th scope="col">Iva</th>
                                   <th scope="col">Valor Total</th>
                                   <th scope="col">Observaciones</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              foreach($ListaCotizacion as $Cotizacion) {
                                   ?>
                                   <tr>
                                   <td><?php echo $Cotizacion->getIdCotizacion();?></td>
                                   <td><?php echo $Cotizacion->getIdEmpresa();?></td>
                                   <td><?php echo $Cotizacion->getIdEstado();?></td>
                                   <td><?php echo $Cotizacion->getMetros_cubicos();?></td>
                                   <td><?php echo $Cotizacion->getValor_Metro();?></td>
                                   <td><?php echo $Cotizacion->getIva();?></td>
                                   <td><?php echo $Cotizacion->getValor_Total();?></td>
                                   <td><?php echo $Cotizacion->getObservaciones();?></td>
                                   <?php
                              }
                              ?>
                              </tbody>
                         </table>
                         <a class="btn btn-outline-primary" href="../../TCPDF/examples/reportepdfcotizacion.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte de Cotizaciones</a>
                         </div>
                    </div>
               </div>
               <div class="col-sm-6">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Detalles de Facturas</h5>
                         <table align="center" class="table table-bordered table-responsive">
                              <thead class="thead-dark">
                                   <tr>
                                   <th scope="col">Detalle Factura N°</th>
                                   <th scope="col">Factura N°</th>
                                   <th scope="col">Producto</th>
                                   <th scope="col">Cantidad</th>
                                   <th scope="col">Valor Unitario°</th>
                                   <th scope="col">Valor Detalle</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              foreach($ListaDetalleFactura as $DeFactura) {
                                   ?>
                                   <tr>
                                   <td><?php echo $DeFactura->getIdDetalleFactura();?></td>
                                   <td><?php echo $DeFactura->getIdFactura();?></td>
                                   <td><?php echo $DeFactura->getIdProducto();?></td>
                                   <td><?php echo $DeFactura->getCantidad();?></td>
                                   <td><?php echo $DeFactura->getValorUnitario();?></td>
                                   <td><?php echo $DeFactura->getValorDetalle();?></td>
                                   <?php
                              }
                              ?>
                              </tbody>
                         </table>
                         <a class="btn btn-outline-primary"  href="../../TCPDF/examples/reportepdfdetallesfacturas.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte Detalles Facturas</a>
                         </div>
                    </div>
               </div>
          </div>
          <br>
          <div class="row">
               <div class="col-sm-4">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Empresas</h5>
                         <table class="table table-bordered table-responsive">
                              <thead class="thead-dark">
                                   <tr>
                                   <th scope="col">Id Eempresa</th>
                                   <th scope="col">Empresa</th>
                                   <th scope="col">Ciudad</th>
                                   <th scope="col">Direccion</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              foreach($ListaEmpresa as $Empresa) {
                                   ?>
                                   <tr>
                                   <td><?php echo $Empresa->getIdEmpresa();?></td>
                                   <td><?php echo $Empresa->getEmpresa();?></td>
                                   <td><?php echo $Empresa->getCiudad();?></td>
                                   <td><?php echo $Empresa->getDireccion();?></td>
                                   <?php
                              }
                              ?>
                              </tbody>
                         </table>
                         <a class="btn btn-outline-primary"  href="../../TCPDF/examples/reportepdfempresa.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte de  Empresas</a>
                         </div>
                    </div>
               </div>
               <div class="col-sm-2">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Estados de Cotización</h5>
                         <table class="table table-bordered table-responsive">
                              <thead class="thead-dark">
                                   <tr>
                                   <th scope="col">Id Estado</th>
                                   <th scope="col">Estado</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              foreach($ListaEstado as $Estado) {
                                   ?>
                                   <tr>
                                   <td><?php echo $Estado->getIdEstado();?></td>
                                   <td><?php echo $Estado->getEstado();?></td>
                                   <?php
                              }
                              ?>
                              </tbody>
                         </table>
                         <a class="btn btn-outline-primary"  href="../../TCPDF/examples/reportepdfestado.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte de  Estados</a>
                         </div>
                    </div>
               </div>
               <div class="col-sm-3">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Productos</h5>
                         <table class="table table-bordered table-responsive">
                              <thead class="thead-dark">
                                   <tr>
                                   <th scope="col">Id Producto</th>
                                   <th scope="col">Producto</th>
                                   <th scope="col">Precio</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              foreach($ListaProducto as $Producto) {
                                   ?>
                                   <tr>
                                   <td><?php echo $Producto->getIdProducto();?></td>
                                   <td><?php echo $Producto->getProducto();?></td>
                                   <td><?php echo $Producto->getPrecio();?></td>
                                   <?php
                              }
                              ?>
                              </tbody>
                         </table>
                         <a class="btn btn-outline-primary"  href="../../TCPDF/examples/reportepdfproductos.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte de  Productos</a>
                         </div>
                    </div>
               </div>
               <div class="col-sm-3">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Facturas</h5>
                         <table align="center" class="table table-bordered table-responsive">
                              <thead class="thead-dark">
                                   <tr>
                                   <th scope="col">Factura N°</th>
                                   <th scope="col">Cliente</th>
                                   <th scope="col">Fecha</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              foreach($ListaFactura as $Factura) {
                                   ?>
                                   <tr>
                                   <td><?php echo $Factura->getIdFactura();?></td>
                                   <td><?php echo $Factura->getIdCliente();?></td>
                                   <td><?php echo $Factura->getFechaFactura();?></td>
                                   <?php
                              }
                              ?>
                              </tbody>
                         </table>
                         <a class="btn btn-outline-primary"  href="../../TCPDF/examples/reportepdffacturas.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte de Facturas</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <footer class="footer " align="center">
          <div class="container">
          <span>Trabajo PHP  Realizado por Juan Felipe Garcia Duque C.C 15.442.460 ADSI</span>
          </div>
     </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>