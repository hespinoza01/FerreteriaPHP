<?php

require_once 'Model_Data.class.php';

class Cliente extends Model_Data{
    public $IDCliente;
    public $Nombre;
    public $Apellido;
    public $Sexo;
    public $F_Nacimiento;
    public $Direccion;
    public $Telefono;
    public $gmail;

    function __construct(){
        parent::__construct('cliente', 'IDCliente');

        $this->IDCliente = -1;
        $this->Nombre = 'default nombre';
        $this->Apellido = 'default apellido';
        $this->Sexo = 'default sexo';
        $this->F_Nacimiento = date('Y-m-d');
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