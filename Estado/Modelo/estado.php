<?php

class Estado{

     // Parametros de ENTRADA
     private $IdEstado;
     private $Estado;
    

     public function __construct(){}

     public function setIdEstado($IdEstado){
          $this->IdEstado = $IdEstado;
     }

     public function getIdEstado(){
          return $this->IdEstado;
     }

     public function setEstado($Estado){
          $this->Estado = $Estado;
     }

     public function getEstado(){
          return $this->Estado;
     }

}

     // $Empresa = new Empresa();
     // $Empresa->setIdEmpresa(1);
     // $Empresa->setEmpresa("maximo construciones");
     // $Empresa->setCiudad("Copacabana");
     // $Empresa->setDireccion("Calle 54  N| 34");

     // echo "Id Empresa n°: " .$Empresa->getIdEmpresa();
     // echo "<br>";
     // echo "Empresa : " .$Empresa->getEmpresa();
     // echo "<br>";
     // echo "Ciudad : " .$Empresa->getCiudad();
     // echo "<br>";
     // echo "Direccion : " .$Empresa->getDireccion();
     // echo "<br>";

?>