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
        mysqli_set_charset($this->MYSQLI, 'utf8');
    }

    function close() {
        $this->MYSQLI->close();
    }

    private function clean_array($model) {
        $base = new Model_Data();
        return array_diff_key(get_object_vars($model), get_object_vars($base));
    }

    // si el valor es un string le añade las comillas simple a utilizar dentro del query
    private function query_value($value){
        return (is_string($value)) ? "'".$value."'" : $value;
    }

    private function logger($query, $error){
        $msg = "Error: La ejecución de la consulta falló debido a:".PHP_EOL;
        $msg = $msg."Query: ".$query.PHP_EOL;
        $msg = $msg."Error: ".$error.PHP_EOL;

        file_put_contents('error.log', $msg);
    }

    // CREA O ACTUALIZA UN REGISTRO DENTRO DE UNA TABLA
    function _save($model){
        $array = $this->clean_array($model); // Se eliminan los atributos heredados de Model_Data
        $_id_ = $this->__NAME_ID_ATTRIBUTE__; // Se establece el nombre del atributo que contiene el ID dentro de la tabla
        $_tablename_ = $this->__TABLENAME__;
        $query = '';
        $_array = array();

        if(!$this->get_by_id($array[$_id_])){ // Si no existen registros con ese ID se procede a crearlo
            foreach ($array as $key => $value) { $_array[$key] = $this->query_value($value); }

            $query = "INSERT INTO ".$_tablename_." VALUES(".implode(', ', $_array).")";
        }else{ // Si ya existe un registro con ese ID se procede a actualizarlo
            foreach ($array as $key => $value) {
                if(strcmp($key, $_id_) == 0) continue;
                array_push($_array, $key." = ".$this->query_value($value));
            }

            $query = "UPDATE ".$_tablename_." SET ".implode(', ', $_array)." WHERE $_id_ = ".$this->query_value($array[$_id_]);
        }

        $this->connect();
        if(!$resultado = $this->MYSQLI->query($query)){
            $this->logger($query, $this->MYSQLI->error);
            exit;
        }

        $this->close();
        return $resultado;
    }

    // OBTIENE TODOS LOS REGISTROS DE UNA TABLA
    function _get_all(){
        $query = "SELECT * FROM ".$this->__TABLENAME__; // Sentencia para obtener todos los registros de la tabla
        $res = array();

        $this->connect();
        if(!$resultado = $this->MYSQLI->query($query)){ // Se ejecuta al detectarse un error en la consulta
            $this->logger($check, $this->MYSQLI->error);
            exit;
        }

        while($row = $resultado->fetch_assoc()){ $res[] = $row; } // carga los registros al array $res

        $resultado->free();
        $this->close();

        return $res;
    }

    // OBTIENE UN REGISTRO A PARTIR DE SU ID
    function _get_by_id($id_register){
        $_id_ = $this->__NAME_ID_ATTRIBUTE__; // Se establece el nombre del atributo que contiene el ID dentro de la tabla
        $_tablename_ = $this->__TABLENAME__;
        $query = "SELECT * FROM ".$_tablename_." WHERE $_id_=".$this->query_value($id_register); // Se obtiene el registro con ese ID dentro de la tabla

        $this->connect();
        if(!$resultado = $this->MYSQLI->query($query)){
            $this->logger($query, $this->MYSQLI->error);
            exit;
        }

        $res = ($resultado->num_rows == 0) ? null : $resultado->fetch_assoc();
        $resultado->free();
        $this->close();

        return $res;
    }


    // CUENTA LA CANTIDAD DE REGISTROS DENTRO DE UNA TABLA
    function count_register(){
        $query = "SELECT COUNT(*) as 'counter' FROM ".$this->__TABLENAME__;

        $this->connect();
        if(!$resultado = $this->MYSQLI->query($query)){
            $this->logger($check, $this->MYSQLI->error);
            exit;
        }

        $res = $resultado->fetch_assoc();

        $resultado->free();
        $this->close();

        return (int)$res['counter'];
    }
}

?>