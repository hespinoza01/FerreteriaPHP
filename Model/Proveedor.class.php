<?php

require_once 'Model_Data.class.php';

class Proveedor extends Model_Data{
    public $IDProveedor;
    public $Nombre;
    public $Direccion;
    public $Telefono;
    public $gmail;

    function __construct(){
        parent::__construct('proveedor', 'IDProveedor');

        $this->IDProveedor = -1;
        $this->Nombre = 'default nombre';
        $this->Direccion = 'default direccion';
        $this->Telefono = 'default telefono';
        $this->gmail = 'default gmail';

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>