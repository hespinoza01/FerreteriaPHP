<?php
    function active_tab($tab){
        if(isset($_GET["tab"])){
            if(strcmp($tab, $_GET["tab"]) == 0) echo 'active';
        }else if(!isset($_GET["tab"]) && strcmp($tab, 'inicio') == 0) echo 'active';

        echo '';
    }
?>

<nav class="main-menu">
    <ul>
        <li class="<?= active_tab('inicio') ?>">
            <a href="index.php">
                <i class="fas fa-store fa-2x"></i>
                <span class="nav-text">Inicio</span>
            </a>
        </li>
        <li class="<?= active_tab('proveedores') ?>">
            <a href="index.php?tab=proveedores">
                <i class="fas fa-store fa-2x"></i>
                <span class="nav-text">Proveedores</span>
            </a>
        </li>
        <li class="<?= active_tab('productos') ?>">
            <a href="index.php?tab=productos">
                <i class="fas fa-boxes fa-2x"></i>
                <span class="nav-text">Productos</span>
            </a>
        </li>
        <li class="<?= active_tab('reportes') ?>">
            <a href="index.php?tab=reportes">
                <i class="fas fa-chart-line fa-2x"></i>
                <span class="nav-text">Reportes</span>
            </a>
        </li>
        <li class="<?= active_tab('usuarios') ?>">
            <a href="index.php?tab=usuarios">
                <i class="fas fa-users fa-2x"></i>
                <span class="nav-text">Gestión Usuarios</span>
            </a>
        </li>
</nav>