<?php

class Model_Data{
    private $USERNAME;
    private $PASSWORD;
    private $DATABASE;
    private $__TABLENAME__;
    private $__NAME_ID_ATTRIBUTE__;
    private $SERVER_URI;
    protected $MYSQLI;

    function __construct($__tablename__ = '', $__name_id_attribute__ = 'ID') {
        $this->USERNAME = "root";
        $this->PASSWORD = getenv('MYSQL_PASSWORD');
        $this->DATABASE = "f_ebenezer";
        $this->__TABLENAME__ = $__tablename__;
        $this->__NAME_ID_ATTRIBUTE__ = $__name_id_attribute__;
        $this->SERVER_URI = "localhost";
    }

    function connect() {
        $this->MYSQLI = new mysqli($this->SERVER_URI, $this->USERNAME, $this->PASSWORD, $this->DATABASE);
    }

    function close() {
        $this->MYSQLI->close();
    }

    private function clean_array($model) {
        $base = new Model_Data();
        return array_diff_key(get_object_vars($model), get_object_vars($base));
    }

    private function logger($query, $error){
        $msg = "Error: La ejecución de la consulta falló debido a:".PHP_EOL;
        $msg = $msg."Query: ".$query.PHP_EOL;
        $msg = $msg."Error: ".$error.PHP_EOL;

        file_put_contents('error.log', $msg);
    }

    function test() {
        $this->connect();
        echo $this->MYSQLI->select_db($this->DATABASE) or die("error on connect");
        $this->close();
    }

    function save($model){
        $array = $this->clean_array($model); // Se eliminan los atributos heredados de Model_Data
        $_id = $this->__NAME_ID_ATTRIBUTE__; // Se establece el nombre del atributo que contiene el ID dentro de la tabla
        $_value = (is_string($array[$_id])) ? "'".$array[$_id]."'" : $array[$_id]; // Si el valor del atributto es un string se la añaden las comillas simples
        $check = "SELECT * FROM ".$this->__TABLENAME__."  WHERE $_id=".$_value; // Se verifica si ya existe un registro con ese ID dentro de la tabla
        $query = '';
        $_array = array();

        $this->connect();
        if(!$resultado = $this->MYSQLI->query($check)){
            $this->logger($check, $this->MYSQLI->error);
            exit;
        }

        if($resultado->num_rows == 0){ // Si no existen registros con ese ID se procede a crearlo
            foreach ($array as $key => $value) {
                $_value = (is_string($value)) ? "'$value'" : $value;
                $_array[$key] = $_value;
            }

            $query = "INSERT INTO ".$this->__TABLENAME__." VALUES(".implode(', ', $_array).")";
        }else{ // Si ya existe un registro con ese ID se procede a actualizarlo
            foreach ($array as $key => $value) {
                if(strcmp($key, $this->__NAME_ID_ATTRIBUTE__) == 0) continue;
                $_value = (is_string($value)) ? "'$value'" : $value;
                array_push($_array, $key." = ".$_value);
            }

            $_value = (is_string($array[$_id])) ? "'".$array[$_id]."'" : $array[$_id];
            $query = "UPDATE ".$this->__TABLENAME__." SET ".implode(', ', $_array)." WHERE $_id = ".$_value;
        }

        $resultado->free(); return $query;
        if(!$resultado = $this->MYSQLI->query($query)){
            $this->logger($query, $this->MYSQLI->error);
            exit;
        }

        $this->close();
        return $resultado;
    }
}

?>