<?php

session_start([ 'cookie_lifetime' => 1800 ]);

if(isset($_SESSION['user'])){
    if((time() - $_SESSION['last_access']) > 3600){
        header("Location: salir.php");
        die();
    }

    $_SESSION['last_access'] = time();    
}else{
    header("Location: acceso.php");
    die();
}

?>