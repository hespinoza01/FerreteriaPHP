<?php

require_once 'Model_Data.class.php';

class Usuario extends Model_Data {
    public $ID;
    public $Contrasenia;
    public $Nombre;
    public $Apellido;
    public $Estado;
    public $FechaCreacion;
    public $FechaModificacion;

    function __construct() {
        parent::__construct('usuario');

        $this->ID = 'default@default';
        $this->Contrasenia = 'default contrasenia';
        $this->Nombre = 'default nombre';
        $this->Apellido = 'default apellido';
        $this->Estado = 1;
        $this->FechaCreacion = date('Y-m-d G:i:s');
        $this->FechaModificacion = date('Y-m-d G:i:s');
    }

    function save(){
        $vars = get_class($this);
        return parent::save($this);
    }
}

?>