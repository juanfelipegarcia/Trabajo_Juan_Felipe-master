<?php

require_once('../../conexion.php');
require_once('../Modelo/Producto.php');
require_once('../Modelo/CrudProducto.php');

$Producto = new Producto();
$CrudProducto =new CrudProducto();

if (isset($_POST["Crear"])) {

     $Producto->setIdProducto(null);
     $Producto->setProducto($_POST["Producto"]);
     $Producto->setPrecio($_POST["Precio"]);

     $CrudProducto::InsertarProducto($Producto);
}
elseif(isset($_POST["Editar"])) {

     $Producto->setIdProducto($_POST["IdProducto"]);
     $Producto->setProducto($_POST["Producto"]);
     $Producto->setPrecio($_POST["Precio"]);
    

     $CrudProducto::ModificarProducto($Producto);

}
elseif ($_GET['Accion']== "EliminarProducto") {

     $CrudProducto::EliminarProducto($_GET["IdProducto"]);
}



?>