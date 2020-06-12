<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}

require_once('../../conexion.php');
require_once('../Modelo/Cotizacion.php');
require_once('../Modelo/CrudCotizacion.php');


$CrudCotizacion = new CrudCotizacion();
$Cotizacion = $CrudCotizacion::ObtenerCotizacion($_GET['IdCotizacion']);

$mysqli = new mysqli('localhost', 'root', '', 'pruebaphp');

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../css/estiloEditarCotizacion.css">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
     <div class="container">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal">Kreemo Solution System</h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="listarCotizacion.php">Cotizaciones</a>
                    <a class="p-2 text-dark" href="../../Empresa/Vista/ListarEmpresa.php">Empresas</a>
               </nav>
               <a class="btn btn-outline-primary" href="../../CerrarSeccion.php">Cerrar Seccion</a>
          </div>
          <h1 align="center">EDITAR Cotizacion</h1>
          <form class="form-signin" action="../Controlador/ControladorCotizacion.php" method="post" id="FrmEditarCotizacion" name="FrmEditarCotizacion">
               <div class="form-row" >
                    <div class="form-group col-md-4">
                         <label for="">Cotización N°</label>
                         <input type="text" class="form-control" name="IdCotizacion" id="IdCotizacion" value="<?php echo $Cotizacion->getIdCotizacion();?>" readonly>
                    </div>
                    <div class="form-group col-md-8">
                         <label for="">Empresa</label>
                         <label class="validacion" id="validacion_empresa"></label>
                         <select id="IdEmpresa"  name= "IdEmpresa" class="form-control">
                              <option value="0"  >Seleccione una Empresa</option>
                              <?php
                              $query = $mysqli -> query ("SELECT * FROM empresa");
                              while ($valores = mysqli_fetch_array($query)) {
                              ?>

                              <option value="<?php echo $valores['IdEmpresa']?>" <?php if($Cotizacion->getIdEmpresa()==$valores['IdEmpresa']){ ?> selected <?php } ?> ><?php echo $valores['Empresa']?></option>;
                              <?php
                              }
                              ?>
                         </select>
                         <label class="validacion" id="validacion_empresa2"></label>
                    </div>
               </div>

               <div class="form-row" >
                    
                    <div class="form-group col-md-6">
                         <label for="inputState">Estado</label>
                         <label class="validacion" id="validacion_Estado"></label>
                         <input type="text" class="form-control" id="Estado" name="Estado" value="<?php echo $Cotizacion->getEstado();?>">
                         <label class="validacion" id="validacion_Estado2"></label>
                    </div>
                    <div class="form-group col-md-6">
                         <label for="inputPassword4">Metros cubicos</label>
                         <label class="validacion" id="validacion_MetrosCubicos"></label>
                         <input type="text" class="form-control solo_numeros" id="Metros_Cubicos" name="Metros_Cubicos" value="<?php echo $Cotizacion->getMetros_Cubicos();?>">
                         <label class="validacion" id="validacion_MetrosCubicos2"></label>
                    </div>
               </div>
               <div class="form-row">
                    <div class="form-group col-md-4">
                         <label for="">Valor Metro Cubico</label>
                         <label class="validacion" id="validacion_ValorMetro"></label>
                         <input type="text" class="form-control solo_numeros" id="Valor_Metro" name="Valor_Metro" onchange="valor_Total()" value="<?php echo $Cotizacion->getValor_Metro();?>">
                         <label class="validacion" id="validacion_ValorMetro2"></label>
                    </div>
                    <div class="form-group col-md-4">
                         <label for="">IVA</label>
                         <label class="validacion" id="validacion_Iva"></label>
                         <input type="text" class="form-control solo_numeros" id="Iva" name="Iva" value="<?php echo $Cotizacion->getIva();?>" readonly>
                         <label class="validacion" id="validacion_Iva2"></label>
                    </div>
                    <div class="form-group col-md-4">
                         <label for="inputPassword4">Valor Total</label>
                         <label class="validacion" id="validacion_ValorTotal"></label>
                         <input type="text" class="form-control solo_numeros" id="Valor_Total" name="Valor_Total" value="<?php echo $Cotizacion->getValor_Total();?>" readonly>
                         <label class="validacion" id="validacion_ValorTotal2"></label>
                    </div>
               </div>
               <div class="mb-3">
                    <label for="validationTextarea">Observaciones</label>
                    <label class="validacion" id="validacion_Observa"></label>
                         <textarea class="form-control " id="Observaciones" name="Observaciones" placeholder="<?php echo $Cotizacion->getObservaciones();?>"></textarea>
                         <label class="validacion" id="validacion_Observa2"></label>
               </div>
               <input type="hidden" name="Editar" id="Editar">
               <button type="submit" class="btn btn-primary">Editar Cotizacion</button>
               </form>
               <br>
               <div align="center">
               <button  type="" class="btn btn-primary"><a href="ListarCotizacion.php"><font color="#ffffff">Volver</font></a></button>
               </div>
     </div>
     <br>
     <footer class="footer " align="center">
          <div class="container">
          <span>Trabajo PHP  Realizado por Juan Felipe Garcia Duque C.C 15.442.460 ADSI</span>
          </div>
     </footer>
</body>
<script src="../js/validaciones2.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>