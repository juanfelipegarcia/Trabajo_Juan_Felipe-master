<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}

require_once('../../conexion.php');
require_once('../../Empresa/Modelo/Empresa.php');
require_once('../../Empresa/Modelo/CrudEmpresa.php');
require_once('../../Producto/Modelo/Producto.php');
require_once('../../Producto/Modelo/CrudProducto.php');

$Empresa = new Empresa();
$CrudEmpresa =new CrudEmpresa();
$ListaEmpresa = $CrudEmpresa -> ListarEmpresa();

$Producto = new Producto();
$CrudProducto = new CrudProducto();
$ListaProducto = $CrudProducto -> ListarProducto();

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../css/estilosCrearFactura.css">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<div class="container">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="../../Navegacion.php">Kreemo Solution System</a></h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="ListarFactura.php">Facturas</a>
                    <a class="p-2 text-dark" href="../../Empresa/Vista/ListarEmpresa.php">Empresas</a>
                    <a class="p-2 text-dark" href="../../Cotizacion/Vista/ListarCotizacion.php">Cotizaciónes</a>
                    <a class="p-2 text-dark" href="../../Estado/Vista/ListarEstado.php">Estados</a>
                    <a class="p-2 text-dark" href="../../Producto/Vista/ListarProducto.php">Producto</a>
               </nav>
               <a class="btn btn-outline-primary" href="../../CerrarSeccion.php">Cerrar Sesion</a>
          </div>
     <h1 align="center">Facturación</h1>
     <br>
     <form class="form-signin col-md-12" action="../Controlador/ControladorFacturacion.php" method="post" id="FrmCrearFactura" name="FrmCrearFactura">
     <div class="form-row" >
          <div class="form-group col-md-6">
               <label for="">CLIENTE</label>
               <label class="validacion" id="validacion_cliente"></label>
               <select id="IdCliente"  name= "IdCliente" class="form-control">
                    <option value="0" >Seleccione una Empresa</option>
                         <?php
                         foreach ($ListaEmpresa as $Empresa){
                              ?>
                              <option value="<?php echo $Empresa->getIdEmpresa();?>"><?php echo $Empresa->getEmpresa();?></option>
                              <?php
                         }
                         
                         ?>
               </select>
               <label class="validacion" id="validacion_cliente2"></label>
          </div>
          <div class="form-group col-md-6">
               <label for="">PRODUCTO</label>
               <label class="validacion" id="validacion_producto"></label>
               <select id="IdProducto"  name= "IdProducto" class="form-control">
                    <option value="0" >Seleccione una Producto</option>
                         <?php
                         foreach ($ListaProducto as $Producto){
                              ?>
                              <option value="<?php echo $Producto->getIdProducto();?>"><?php echo $Producto->getProducto();?></option>
                              <?php
                         }
                         ?>
               </select>
               <label class="validacion" id="validacion_producto2"></label>
          </div>
     </div>
     <div class="form-row" >
          <div class="form-group col-md-6">
               <label for="">PRECIO</label>
               <label class="validacion" id="validacion_precio"></label>
               <input type="text" class="form-control solo_numeros" id="PrecioProducto" name="PrecioProducto">
               <label class="validacion" id="validacion_precio2"></label>
          </div>
          <div class="form-group col-md-6">
               <label for="">CANTIDAD</label>
               <label class="validacion" id="validacion_cantidad"></label>
               <input type="text" class="form-control solo_numeros" id="CantidadProducto" name="CantidadProducto">
               <label class="validacion" id="validacion_cantidad2"></label>
          </div>
          </div>
     <button class="btn btn-primary" type="button" name="AgregarProducto" id="AgregarProducto" >Agregar</button>
     
     <br>
     <br>
     <table align="center" id="ListaProductos" border="1" class="table table-bordered table-responsive">
     <thead class="thead-dark">
     <th scope="col">Nombre</th>
     <th scope="col">Codigo</th>
     <th scope="col">Cantidad</th>
     <th scope="col">Precio</th>
     <th scope="col">Valor Detalle</th>
     <th scope="col">Eliminar</th>
     </thead>
     <tbody>

     </tbody>
     </table>
     <br>
     <input type="text"  class="form-control col-md-2" id="ProductosAgregados" name="ProductosAgregados" value="0">
     <br>
     <input type="hidden" name="Registrar" id="Registrar">
     <button class="btn btn-primary" type="submit">Registrar</button>
     </form>
     
</div>
     <br>
     <div align="center">
     <a class="btn btn-outline-primary" href="listarFactura.php">Volver</a>
     </div>

</body>

<script src="../js/validaciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>


