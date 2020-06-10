<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="css/estilosIndex.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body class="text-center">
     <form class="form-signin" action="Usuario/Controlador/ControladorUsuario.php" method="post" id="FrmInicioSeccion" name="FrmInicioSeccion">
          <img class="mb-4" src="img/kreemo_nombres.png" alt="" width="100" height="100">
          <h1 class="h3 mb-3 font-weight-normal">Ingreso de Usuario</h1>
          <label for="text">Usuario</label>
          <label style="color: red;" id="validacion_nombre"></label>
          <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Ingrese Usuario">
          <label style="color: red;" id="validacion_nombre2"></label>
          <br>
          <label for="inputPassword">Password</label>
          <label style="color: red;" id="validacion_clave"></label>
          <input type="password" id="Clave" name="Clave" class="form-control" placeholder="Digite la Clave" >
          <label style="color: red;" id="validacion_clave2"></label>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="Acceder" id="Acceder" value="Acceder">Ingresar</button>
          <p class="mt-5 mb-3 text-muted">Kreemo Solution System &copy; 2020</p>
          </form>
</body>
<script src="js/validacionInicio.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>