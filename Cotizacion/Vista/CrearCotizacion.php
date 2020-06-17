<?php

session_start();

if (!(isset($_SESSION["Nombre"]))) {
 header("location:../../Index.php");    
}



$mysqli = new mysqli('localhost', 'root', '', 'pruebaphp');

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../css/estiloCrearCotizacion.css">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.all.min.js"></script>
     
</head>
<body>
     <div class="container">
          <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
               <h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="../../Navegacion.php">Kreemo Solution System</a></h5>
               <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="listarCotizacion.php">Cotizaciónes</a>
                    <a class="p-2 text-dark" href="../../Empresa/Vista/ListarEmpresa.php">Empresas</a>
                    <a class="p-2 text-dark" href="../../Estado/Vista/ListarEstado.php">Estados</a>
               </nav>
               <a class="btn btn-outline-primary" href="../../CerrarSeccion.php">Cerrar Seccion</a>
          </div>
          <h1 align="center">Crear Cotización</h1>
          <br>
          <form class="form-signin col-md-8" action="../Controlador/ControladorCotizacion.php" method="post" id="FrmCrearCotizacion" name="FrmCrearCotizacion">

               <div class="form-row" >
                    <div class="form-group col-md-8">
                         <label for="">Empresa</label>
                         <label class="validacion" id="validacion_empresa"></label>
                         <select id="IdEmpresa"  name= "IdEmpresa" class="form-control">
                              <option value="0" >Seleccione una Empresa</option>
                              <?php
                              $query = $mysqli -> query ("SELECT * FROM empresa");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo '<option value="'.$valores[IdEmpresa].'">'.$valores[Empresa].'</option>';
                              }
                              ?>
                         </select>
                         <label class="validacion" id="validacion_empresa2"></label>
                    </div>
               </div>
               <div class="form-row" >
                    <div class="form-group col-md-8">
                         <label for="">Estado</label>
                         <label class="validacion" id="validacion_Estado"></label>
                         <!-- <input type="text" class="form-control" id="Estado" name="Estado"> -->
                         <select id="IdEstado"  name= "IdEstado" class="form-control">
                              <option value="0" >Seleccione un Estado</option>
                              <?php
                              $query = $mysqli -> query ("SELECT * FROM estado");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo '<option value="'.$valores[IdEstado].'">'.$valores[Estado].'</option>';
                              }
                              ?>
                         </select>
                         <label class="validacion" id="validacion_Estado2"></label>
                    </div>
                    <div class="form-group col-md-4">
                         <label for="inputPassword4">Metros m<sup>3</sup></label>
                         <label class="validacion" id="validacion_MetrosCubicos"></label>
                         <input type="text" class="form-control solo_numeros" id="Metros_Cubicos" name="Metros_Cubicos">
                         <label class="validacion" id="validacion_MetrosCubicos2"></label>
                    </div>
               </div>
               <div class="form-row">
                    <div class="form-group col-md-4">
                         <label for="">Valor Metro <sup>3</sup></label>
                         <label class="validacion" id="validacion_ValorMetro"></label>
                         <input type="text" class="form-control  solo_numeros" id="Valor_Metro" name="Valor_Metro" onchange="valor_Total()">
                         <label class="validacion" id="validacion_ValorMetro2"></label>
                    </div>
                    <div class="form-group col-md-4">
                         <label for="">IVA</label>
                         <label class="validacion" id="validacion_Iva"></label>
                         <input type="text" class="form-control solo_numeros" id="Iva" name="Iva" readonly>
                         <label class="validacion" id="validacion_Iva2"></label>
                    </div>
                    <div class="form-group col-md-4">
                         <label for="inputPassword4">Valor Total</label>
                         <label class="validacion" id="validacion_ValorTotal"></label>
                         <input type="text" class="form-control solo_numeros" id="Valor_Total" name="Valor_Total" readonly>
                         <label class="validacion" id="validacion_ValorTotal2"></label>
                    </div>
               </div>
               <div class="mb-3">
                    <label for="validationTextarea">Observaciones</label>
                    <label class="validacion" id="validacion_Observa"></label>
                         <textarea class="form-control " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
                         <label class="validacion" id="validacion_Observa2"></label>
               </div>
               <input type="hidden" name="Crear" id="Crear">
               <button type="submit" class="btn btn-primary">Crear Cotizacion</button>
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
<script src="../js/validaciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>