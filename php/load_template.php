<?php

function load_template($template){
    ob_start();
    include "$template";
    echo ob_get_clean();
}

?>