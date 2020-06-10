<?php

class CrudUsuario{
     
     public function __construct(){}

     public function ValidarAcceso($Usuario){
          $Db = Db::Conectar();

          $sql = $Db->prepare('SELECT * FROM usuarios WHERE Nombre=:Nombre AND Clave=:Clave AND Estado=1');
          $sql->bindvalue('Nombre',$Usuario->getNombre());
          $sql->bindvalue('Clave',$Usuario->getClave());
          $sql->execute();//ejecuta  consulta
          $MiUsuario = new Usuario();
          $MiUsuario->SetExiste(0);

          if($sql->rowCount() > 0) { // dtermina el numero de registros en la consulta
               $DatosUsuario = $sql->fetch();//almacena datos arrojados
               
               $MiUsuario->setIdUsuario($DatosUsuario['IdUsuario']);
               $MiUsuario->setNombre($DatosUsuario['Nombre']);
               $MiUsuario->setTipoUsuario($DatosUsuario['TipoUsuario']);
               $MiUsuario->SetExiste(1);               
          }
          return $MiUsuario;

     }

}



?>