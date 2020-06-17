<?php

class Producto{

     // Parametros de ENTRADA
     private $IdProducto;
     private $Producto;
     private $Precio;
    

     public function __construct(){}

     public function setIdProducto($IdProducto){
          $this->IdProducto = $IdProducto;
     }

     public function getIdProducto(){
          return $this->IdProducto;
     }

     public function setProducto($Producto){
          $this->Producto = $Producto;
     }

     public function getProducto(){
          return $this->Producto;
     }

     public function setPrecio($Precio){
          $this->Precio = $Precio;
     }

     public function getPrecio(){
          return $this->Precio;
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