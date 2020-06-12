<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:Index.php");    
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="css/estiloNavegacion.css">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
     <div class="container">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal">Kreemo Solution System</h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    
               </nav>
               <a class="btn btn-outline-primary" href="CerrarSeccion.php">Cerrar Seccion</a>
          </div>

          <h1 align="center">SELECCIONE EL MODULO</h1>
          <br>
          <div class="row" align="center">
               <div class="col-sm-6">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Cotización</h5>
                         <a href="Cotizacion/Vista/ListarCotizacion.php" class="btn btn-primary">Ir a Cotización</a>
                         </div>
                    </div>
               </div>
               <div class="col-sm-6">
                    <div class="card">
                         <div class="card-body">
                         <h5 class="card-title">Empresa</h5>
                         <a href="Empresa/Vista/ListarEmpresa.php" class="btn btn-primary">Ir a Empresa</a>
                         </div>
                    </div>
               </div>
          </div>
          <br>
          <footer class="footer ">
          <div class="container">
          <span>Trabajo PHP  Realizado por Juan Felipe Garcia Duque C.C 15.442.460 ADSI</span>
          </div>
          </footer>
     </div>
     
     
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>