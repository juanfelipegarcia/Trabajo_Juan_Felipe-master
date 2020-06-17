<?php

class Factura{

    private $IdFactura;
    private $IdCliente;
    private $FechaFactura;

    function __construct(){}

    public function setIdFactura($IdFactura)
    {
        $this->IdFactura = $IdFactura;
    }

    public function getIdFactura(){
        return $this->IdFactura;
    }

    public function setIdCliente($IdCliente)
    {
        $this->IdCliente = $IdCliente;
    }

    public function getIdCliente(){
        return $this->IdCliente;
    }

    public function setFechaFactura($FechaFactura)
    {
        $this->FechaFactura = $FechaFactura;
    }

    public function getFechaFactura(){
        return $this->FechaFactura;
    }
}

// // testear  funcionalidad de clase.
// $Competencia = new Competencia(); //Crear objeto
// $Competencia->setCodigoCompetencia(27);
// $Competencia->setNombreCompetencia("Pytom");
// echo "Codigo Competencia : " .$Competencia->getCodigoCompetencia(). " Nombre Competencia : " .$Competencia->getNombreCompetencia();

?>