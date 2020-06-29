<?php

require_once 'Model_Data.class.php';

class Ingreso extends Model_Data{
    public $IDIngreso;
    public $IDTrabajador;
    public $IDProveedor;
    public $Codigo;
    public $Articulo;
    public $Fecha;
    public $stock;
    public $Precio;

    function __construct(){
        parent::__construct('ingreso', 'IDIngreso');

        $this->IDIngreso = -1;
        $this->IDTrabajador = -1;
        $this->IDProveedor = -1;
        $this->Codigo = -1;
        $this->Articulo = "default articulo";
        $this->Fecha = date('Y-m-d');
        $this->stock = "0";
        $this->Precio = 0;

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>