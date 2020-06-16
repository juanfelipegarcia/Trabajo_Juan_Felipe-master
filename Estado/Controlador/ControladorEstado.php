<?php

require_once('../../conexion.php');
require_once('../Modelo/Estado.php');
require_once('../Modelo/CrudEstado.php');

$Estado = new Estado();
$CrudEstado =new CrudEstado();

if (isset($_POST["Crear"])) {

     $Estado->setIdEstado(null);
     $Estado->setEstado($_POST["Estado"]);
     

     $CrudEstado::InsertarEstado($Estado);
}
elseif(isset($_POST["Editar"])) {

     $Estado->setIdEstado($_POST["IdEstado"]);
     $Estado->setEstado($_POST["Estado"]);
    

     $CrudEstado::ModificarEstado($Estado);

}
elseif ($_GET['Accion']== "EliminarEstado") {

     $CrudEstado::EliminarEstado($_GET["IdEstado"]);
}



?>