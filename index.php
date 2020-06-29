<?php 
    require_once 'php/load_template.php';
    include 'php/check_access.php';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            require_once 'cache_control/no_cache_html.php';
            include 'cache_control/no_cache_php.php';
            no_cache_html();
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="icons/ventas.ico"/>
        <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Página Principal</title>
    </head>
    <body>
        <?php load_template('templates/menubar.html.php'); ?>
        <?php load_template('templates/mainmenu.html.php'); ?>

        <main class="main-container"></main>
    </body>
</html>