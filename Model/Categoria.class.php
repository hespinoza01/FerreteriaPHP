<?php

require_once 'Model_Data.class.php';

class Categoria extends Model_Data{
    public $IDCategoria;
    public $Nombre;
    public $Descripcion;

    function __construct(){
        parent::__construct('categoria', 'IDCategoria');

        $this->IDCategoria = -1;
        $this->Nombre = 'default nombre';
        $this->Descripcion = 'default descripcion';

        return $this;
    }

    function save(){
        return parent::_save();
    }
}

?>