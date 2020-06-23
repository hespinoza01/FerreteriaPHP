<?php

class Model_Data{
    private $USERNAME;
    private $PASSWORD;
    private $DATABASE;
    private $__TABLENAME__;
    private $SERVER_URI;
    protected $MYSQLI;

    function __construct($__tablename__) {
        $this->USERNAME = "root";
        $this->PASSWORD = getenv('MYSQL_PASSWORD');
        $this->DATABASE = "f_ebenezer";
        $this->__TABLENAME__ = $__tablename__;
        $this->SERVER_URI = "localhost";
    }

    function connect() {
        $this->MYSQLI = new mysqli($this->SERVER_URI, $this->USERNAME, $this->PASSWORD, $this->DATABASE);
    }

    function close() {
        $this->MYSQLI->close();
    }

    private function clean_array($model) {
        $base = new Model_Data('');
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
        $array = $this->clean_array($model);
        $check = "SELECT * FROM ".$this->__TABLENAME__."  WHERE ID='".$array['ID']."'";
        $query = '';
        $_array = array();

        $this->connect();
        if(!$resultado = $this->MYSQLI->query($check)){
            $this->logger($check, $this->MYSQLI->error);
            exit;
        }

        if($resultado->num_rows == 0){
            foreach ($array as $key => $value) {
                $_value = (is_string($value)) ? "'$value'" : $value;
                $_array[$key] = $_value;
            }

            $query = "INSERT INTO ".$this->__TABLENAME__." VALUES(".implode(', ', $_array).")";
        }else{
            foreach ($array as $key => $value) {
                $_value = (is_string($value)) ? "'$value'" : $value;
                array_push($_array, $key." = ".$_value);
            }

            $_value = (is_string($array['ID'])) ? "'".$array['ID']."'" : $array['ID'];
            $query = "UPDATE ".$this->__TABLENAME__." SET ".implode(', ', $_array)." WHERE ID = ".$_value;
        }

        $resultado->free();
        if(!$resultado = $this->MYSQLI->query($query)){
            $this->logger($query, $this->MYSQLI->error);
            exit;
        }

        $this->close();
        return $resultado;
    }
}

?>