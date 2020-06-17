<?php
class DetalleFactura{
    private $IdDetalleFactura;
    private $IdFactura;
    private $IdProducto;
    private $Cantidad;
    private $ValorUnitario;
    private $ValorDetalle;

    function __construct(){}

    public function setIdDetalleFactura($IdDetalleFactura)
    {
        $this->IdDetalleFactura = $IdDetalleFactura;
    }

    public function getIdDetalleFactura(){
        return $this->IdDetalleFactura;
    }

    public function setIdFactura($IdFactura)
    {
        $this->IdFactura = $IdFactura;
    }

    public function getIdFactura(){
        return $this->IdFactura;
    }

    public function setIdProducto($IdProducto)
    {
        $this->IdProducto = $IdProducto;
    }

    public function getIdProducto(){
        return $this->IdProducto;
    }

    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
    }

    public function getCantidad(){
        return $this->Cantidad;
    }

    public function setValorUnitario($ValorUnitario)
    {
        $this->ValorUnitario = $ValorUnitario;
    }

    public function getValorUnitario(){
        return $this->ValorUnitario;
    }

    public function setValorDetalle($ValorDetalle)
    {
        $this->ValorDetalle = $ValorDetalle;
    }

    public function getValorDetalle(){
        return $this->ValorDetalle;
    }

}
?>