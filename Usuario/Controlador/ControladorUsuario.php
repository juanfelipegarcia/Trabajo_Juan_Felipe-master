<?php

require_once("../../Conexion.php");
require_once("../Modelo/Usuario.php");
require_once("../Modelo/CrudUsuario.php");

$Usuario = new Usuario();
$CrudUsuario = new CrudUsuario();

if(isset($_POST["Acceder"])){
     //echo "Acceder";
     $Usuario->setNombre($_POST["Nombre"]);
     $Usuario->setClave($_POST["Clave"]);

     //var_dump($Usuario);
     

     $Usuario = $CrudUsuario->ValidarAcceso($Usuario);
     //var_dump($Usuario);
     if($Usuario->getExiste()==1){
          session_start();//inicializa la seccion.section-1
          //Definir las variables de seccion a emplear en el aplicativo
          $_SESSION["Nombre"] = $Usuario->getNombre();
          $_SESSION["IdUsuario"] = $Usuario->getIdUsuario();
          $_SESSION["Estado"] = $Usuario->getEstado();
          header("location:../../Navegacion.php");
     }
     else
     {
          ?>
          <script>
          //header("location:../../index.php");
          alert("Usuario y/o clave  incorrecta");
          document.location.href="../../Index.php";
          </script>
          <?php
     }
}
else 
{
          header("location:../../index.php");
}



?>