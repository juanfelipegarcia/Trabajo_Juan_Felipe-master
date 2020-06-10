<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}

require_once('../../conexion.php');
require_once('../Modelo/Empresa.php');
require_once('../Modelo/CrudEmpresa.php');


$CrudEmpresa = new CrudEmpresa();
$Empresa = $CrudEmpresa::ObtenerEmpresa($_GET['IdEmpresa']);



?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
</head>
<body >
     <div class="container col-md-3">
          <ul class="nav justify-content-end">
               <li class="nav-item">
               <button type="button" class="btn btn-outline-info"><a class="nav-link active" href="../../CerrarSeccion.php">Cerrar Seccion</a></button>
               </li>
          </ul>
          <h1 align="center">Editar Empresa</h1>
          <br>
          <form action="../Controlador/ControladorEmpresa.php" method="post" id="FrmEditarEmpresa" name="FrmCrearEmpresa">
               <div class="form-row" >
                    <div class="form-group col-md-3">
                         <label for="">Empresa N°</label>
                         <input type="text" class="form-control" name="IdEmpresa" id="IdEmpresa" value="<?php echo $Empresa->getIdEmpresa();?>" readonly>
                    </div>
               </div>

               <div class="form-row " >
                    <div class="form-group col-md-12">
                         <label for="">Nombre de la Empresa</label>
                         <label class="validacion" id="validacion_empresa"></label>
                         <input type="text" class="form-control" id="Empresa" name="Empresa" value="<?php echo $Empresa->getEmpresa();?>">
                         <label class="validacion" id="validacion_empresa2"></label>
                    </div>
               </div>
               <div class="form-row">
                    <div class="form-group col-md-12">
                         <label for="inputState">Ciudad</label>
                         <label class="validacion" id="validacion_Ciudad"></label>
                         <input type="text" class="form-control" id="Ciudad" name="Ciudad" value="<?php echo $Empresa->getCiudad();?>">
                         <label class="validacion" id="validacion_Ciudad2"></label>
                    </div>
               </div>
               <div class="form-row">
                    <div class="form-group col-md-12">
                         <label for="inputState">Direccion</label>
                         <label class="validacion" id="validacion_Direccion"></label>
                         <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo $Empresa->getDireccion();?>">
                         <label class="validacion" id="validacion_Direccion2"></label>
                    </div>
               </div>

               <input type="hidden" name="Editar" id="Editar">
               <button type="submit" class="btn btn-primary">Editar Empresa</button>
               </form>
               <br>
               <div class="form-row" align="center">
               <button  type="" class="btn btn-primary"><a href="ListarEmpresa.php"><font color="#ffffff">Volver</font></a></button>
               </div>

     </div>
</body>
<!-- <script src="../js/validaciones.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>