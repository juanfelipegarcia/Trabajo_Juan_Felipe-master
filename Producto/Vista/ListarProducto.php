<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}


require_once('../../conexion.php');
require_once('../Modelo/Producto.php');
require_once('../Modelo/CrudProducto.php');

$CrudProducto = new CrudProducto();
$ListaProducto = $CrudProducto->ListarProducto();

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
     <div class="container">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="../../Navegacion.php">Kreemo Solution System</a></h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="../../Empresa/Vista/ListarEmpresa.php">Empresas</a>
                    <a class="p-2 text-dark" href="../../Cotizacion/Vista/ListarCotizacion.php">Cotizaciónes</a>
                    <a class="p-2 text-dark" href="../../facturacion/Vista/ListarFactura.php">Facturas</a>
                    <a class="p-2 text-dark" href="../../Estado/Vista/ListarEstado.php">Estado</a>
               </nav>
               <a class="btn btn-outline-primary" href="../../CerrarSeccion.php">Cerrar Sesion</a>
          </div>

          <h1 align="center">PRODUCTOS</h1>
          <br>
          <ul class="nav nav-fill">
               <li class="nav-item">
               <a class="btn btn-outline-primary"  href="CrearProducto.php"><i class="fas fa-plus-circle"></i> Crear un Producto</a>
               </li>
               <li class="nav-item">
               <a class="btn btn-outline-primary"  href="../../TCPDF/examples/reportepdfproductos.php" target="_blank"><i class="fas fa-file-pdf"></i> Reporte de  Productos</a>
               </li>
          </ul>
          <br>
          <table class="table table-bordered">
               <thead class="thead-dark">
                    <tr>
                    <th scope="col">Id Producto</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
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
                    <td>
                    <a href="EditarProducto.php?IdProducto=<?php echo $Producto->getIdProducto();?>">Editar</a> 
                    </td>
                    <td>
                    <a href="../Controlador/ControladorProducto.php?IdProducto=<?php echo $Producto->getIdProducto();?>&Accion=EliminarProducto">Eliminar</a> 
                    </td>

                    
                    <?php
                    
               }
               ?>
               </tbody>
          </table>

          <a class="btn btn-outline-primary"  href="../../Navegacion.php">Volver</a>
     </div>
     <br>
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