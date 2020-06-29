<?php

require_once 'Model_Data.class.php';

class Detalle_Ingreso extends Model_Data{
    public $IDDetalle_Ingreso;
    public $IDArticulo;
    public $IDIngreso;

    function __construct(){
        parent::__construct('detalle_ingreso', 'IDIngreso');

        $this->IDDetalle_Ingreso = -1;
        $this->IDArticulo = -1;
        $this->IDIngreso = -1;

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>