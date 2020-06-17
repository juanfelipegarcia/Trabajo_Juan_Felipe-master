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
     <link rel="stylesheet" href="../css/estilosCrearFactura.css">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
     <h1 align="center">Facturación</h1>
     <br>
     <form class="form-signin col-md-12" action="../Controlador/ControladorFacturacion.php" method="post">
     <div class="form-row" >
          <div class="form-group col-md-6">
               <label for="">CLIENTE</label>
               <select id="IdCliente"  name= "IdCliente" class="form-control">
                    <option value="0" >Seleccione una Empresa</option>
                         <?php
                         $query = $mysqli -> query ("SELECT * FROM empresa");
                         while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[IdEmpresa].'">'.$valores[Empresa].'</option>';
                         }
                         ?>
               </select>
          </div>
          <div class="form-group col-md-6">
               <label for="">PRODUCTO</label>
               <select id="IdProducto"  name= "IdProducto" class="form-control">
                    <option value="0" >Seleccione una Producto</option>
                         <?php
                         $query = $mysqli -> query ("SELECT * FROM producto");
                         while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[IdProducto].'">'.$valores[Producto].'</option>';
                         }
                         ?>
               </select>
          </div>
     </div>
     <div class="form-row" >
          <div class="form-group col-md-6">
               <label for="">PRECIO</label>
               <input type="text" class="form-control" id="PrecioProducto" name="PrecioProducto">
          </div>
          <div class="form-group col-md-6">
               <label for="">CANTIDAD</label>
               <input type="text" class="form-control" id="CantidadProducto" name="CantidadProducto">
          </div>
          </div>
     <button type="button" name="AgregarProducto" id="AgregarProducto" onclick="AgregarDetalle()">Agregar</button>
     
     <br>
     <br>
     <table align="center" id="ListaProductos" border="1" class="table table-bordered">
     <thead>
     <th>Nombre</th>
     <th>Codigo</th>
     <th>Cantidad</th>
     <th>Precio</th>
     <th>Valor Detalle</th>
     <th></th>
     </thead>
     <tbody>

     </tbody>
     </table>
     <br>
     <input type="text"  class="form-control col-md-2" id="ProductosAgregados" name="ProductosAgregados" value="0">
     <br>
     <input type="hidden" name="Registrar" id="Registrar">
     <button type="submit">Registrar</button>
     </form>
     
</div>
     <br>
     <div align="center">
     <button><a href="listarFactura.php">Volver</a></button>
     </div>

</body>
<script>
    function AgregarDetalle()
    {
        let CodigoProducto = $('#IdProducto').val();//Capturar el ´código del producto seleccionado
        let NombreProducto = $('select[name="IdProducto"] option:selected').text(); // Capturar el código del producto que está seleccionado
        let CantidadProducto = $('#CantidadProducto').val(); //Capturar la Cantidad del producto
        let PrecioProducto = $('#PrecioProducto').val(); //Capturar El precio
        let ValorDetalle = CantidadProducto*PrecioProducto;

        $('#ProductosAgregados').val(parseInt($('#ProductosAgregados').val()) + 1);//Incrementar Productos Agregados
        let ConsecutivoProducto = $('#ProductosAgregados').val();

        let htmlTags = '<tr>' +
        '<td>' + NombreProducto + '</td>' +
        '<td>' + '<input type="text" id="IdProducto'+ConsecutivoProducto+'" name="IdProducto'+ConsecutivoProducto+'" value="'+CodigoProducto+'">'+'</td>' +
        '<td>' + '<input type="text" id="CantidadProducto'+ConsecutivoProducto+'" name="CantidadProducto'+ConsecutivoProducto+'" value="'+CantidadProducto+'">'+'</td>' +
        '<td>' + '<input type="text" id="PrecioProducto'+ConsecutivoProducto+'" name="PrecioProducto'+ConsecutivoProducto+'" value="'+PrecioProducto+'">'+'</td>' +
        '<td>' + '<input type="text" id="ValorDetalle'+ConsecutivoProducto+'" name="ValorDetalle'+ConsecutivoProducto+'" value="'+ValorDetalle+'">'+'</td>' +
        '<td>' +  '<button type="button" onclick="EliminarDetalle('+ConsecutivoProducto+')" >Eliminar</button>' +'</td>' +
        '</tr>';
       $('#ListaProductos tbody').append(htmlTags);//app agregar al final de la tabla filas
    }

    function EliminarDetalle(ConsecutivoProducto)
    {
        alert(ConsecutivoProducto);
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>


