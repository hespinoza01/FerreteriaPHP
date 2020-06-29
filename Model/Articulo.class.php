<?php

require_once 'Model_Data.class.php';
require_once 'Presentacion.class.php';
require_once 'Categoria.class.php';

class Articulo extends Model_Data{
    public $IDArticulo;
    public $IDPresentacion;
    public $IDCategoria;
    public $Codigo;
    public $Nombre;
    public $Descripcion;

    function __construct(){
        parent::__construct('articulo', 'IDArticulo');

        $this->IDArticulo = -1;
        $this->IDPresentacion = -1;
        $this->IDCategoria = -1;
        $this->Codigo = -1;
        $this->Nombre = 'default nombre';
        $this->Descripcion = 'default descripcion';

        return $this;
    }

    function save(){
        return parent::_save($this);
    }
}

?>