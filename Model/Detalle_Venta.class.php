<?php

require_once 'Model_Data.class.php';

class Detalle_Venta extends Model_Data{
    public $IDDetalle_Venta;
    public $IDTrabajador;
    public $IDVenta;

    function __construct(){
        parent::__construct('detalle_venta', 'IDDetalle_Venta');

        $this->IDDetalle_Venta = -1;
        $this->IDTrabajador = -1;
        $this->IDVenta = -1;

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>