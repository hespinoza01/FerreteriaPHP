<?php

require_once 'Model_Data.class.php';

class Trabajador extends Model_Data{
    public $IDTrabajador;
    public $Nombre;
    public $Apellido;
    public $F_Nacimiento;
    public $Direccion;
    public $Telefono;
    public $gmail;
    public $Acceso;
    public $Usuario;
    public $Password;

    function __construct(){
        parent::__construct('trabajador', 'IDTrabajador');

        $this->IDTrabajador = -1;
        $this->Nombre = 'default nombre';
        $this->Apellido = 'default apellido';
        $this->F_Nacimiento = 'default f_nacimiento';
        $this->Direccion = 'default direccion';
        $this->Telefono = 'default telefono';
        $this->gmail = 'default gmail';
        $this->Acceso = 'default acceso';
        $this->Usuario = 'default usuario';
        $this->Password = 'default password';

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>