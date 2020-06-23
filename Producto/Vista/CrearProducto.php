<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../css/estiloEditarE.css">
     <link rel="stylesheet" href="../css/estiloValidacion.css">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
     
</head>
<body >
     <div class="container">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="../../Navegacion.php">Kreemo Solution System</a></h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="ListarProducto.php">Productos</a>
                    <a class="p-2 text-dark" href="../../Estado/Vista/ListarEstado.php">Estados</a>
                    <a class="p-2 text-dark" href="../../Empresa/Vista/ListarEmpresa.php">Empresas</a>
                    <a class="p-2 text-dark" href="../../Cotizacion/Vista/ListarCotizacion.php">Cotizaciónes</a>
                    <a class="p-2 text-dark" href="../../facturacion/Vista/ListarFactura.php">Facturas</a>
                    
               </nav>
               <a class="btn btn-outline-primary" href="../../CerrarSeccion.php">Cerrar Sesion</a>
          </div>
          <h1 align="center">Ingresar Producto</h1>
          <br>
          <form class="form-signin" action="../Controlador/ControladorProducto.php" method="post" id="FrmCrearProducto" name="FrmCrearProducto">

               <div class="form-row " >
                    <div class="form-group col-md-12">
                         <label for="">Producto</label>
                         <label class="validacion" id="validacion_producto"></label>
                         <input type="text" class="form-control" id="Producto" name="Producto">
                         <label class="validacion" id="validacion_producto2"></label>
                    </div>
               </div>
               <div class="form-row " >
                    <div class="form-group col-md-12">
                         <label for="">Precio</label>
                         <label class="validacion" id="validacion_precio"></label>
                         <input type="text" class="form-control solo_numeros" id="Precio" name="Precio">
                         <label class="validacion" id="validacion_precio2"></label>
                    </div>
               </div>

               <input type="hidden" name="Crear" id="Crear">
               <button type="submit" class="btn btn-primary">Crear Producto</button>
               </form>
               <br>
               <div  align="center">
               <a class="btn btn-outline-primary" href="ListarProducto.php">Volver</a>
               </div>
     </div>
     <br>
     <footer class="footer " align="center">
          <div class="container">
          <span>Trabajo PHP  Realizado por Juan Felipe Garcia Duque C.C 15.442.460 ADSI</span>
          </div>
     </footer>
</body>
<script src="../js/validacionesCrear.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>