<?php

require_once 'Model_Data.class.php';

class Venta extends Model_Data{
    public $IDVenta;
    public $IDCliente;
    public $Fecha;
    public $IDArticulo;
    public $Cantidad;
    public $Precio;
    public $Descuento;

    function __construct(){
        parent::__construct('venta', 'IDVenta');

        $this->IDVenta = -1;
        $this->IDCliente = -1;
        $this->Fecha = date('Y-m-d');
        $this->IDArticulo = -1;
        $this->Cantidad = -1;
        $this->Precio = 0;
        $this->Descuento = 0;

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>