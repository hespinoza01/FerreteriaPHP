<?php

require_once 'Model_Data.class.php';

class Presentacion extends Model_Data{
    public $IDPresentacion;
    public $Nombre;
    public $Descripcion;

    function __construct(){
        parent::__construct('presentacion', 'IDPresentacion');

        $this->IDPresentacion = -1;
        $this->Nombre = 'default nombre';
        $this->Descripcion = 'default descripcion';

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>