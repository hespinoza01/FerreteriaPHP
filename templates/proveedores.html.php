<link rel="stylesheet" href="css/user.css">
<!--<ul class="tabs">
    <li>
        <a id="link-buscar" href="#buscar" onclick="inicio(this)"><span>Buscar</span></a>
    </li>
    <li>
        <a id="link-nuevo" href="#nuevo" onclick="inicio(this)"><span>Nuevo Proveedor</span></a>
    </li>
    <li>
        <a id="link-modificar" href="#modificar" onclick="inicio(this)"><span>Modificar Proveedor</span></a>
    </li>
</ul> -->

<section class="contenido">
<div class="table-container paquete1">
    <h2><strong>Proveedores</strong></h2>
    <table>
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Keyling Brigitte Rojas Gomez</td>
                <td>Administrador</td>
                <td></td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Veronica Paola Arroliga Garcia</td>
                <td>Cajero</td>
                <td></td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Julio Moises Moreira Benavides</td>
                <td>Vendedor</td>
                <td></td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Marcos Antonio Jalinas Hernandez</td>
                <td>Bodeguero</td>
                <td></td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Eli Josue Vallejos Toruño</td>
                <td>Jefe de Ventas</td>
                <td></td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
        </tbody>
    </table>

</div>
<div id="nuevo" class="form-container paquete2">
    <form action="">
        <h2><strong>Datos del Nuevo Proveedor</strong></h2>
        <label for="">Empresa:</label><br>
        <input type="text" value="" placeholder="Nombre" required><br>
        <label for="">Contacto:</label><br>
        <input type="text" value="" placeholder="Nombre" required><br>
        <input type="text" value="" placeholder="Teléfono" required><br>
        <label for="">Correo electronico:</label><br>
        <input type="email" name="" id="" placeholder="Email" required><br><br>
        <button type="submit"><i class="fas fa-save"></i>Guardar</button>
        <button class="cancelar"><i class="fas fa-angle-right"></i>Cancelar</button><br>
    </form>
</div>
</section>

<script>
    document.getElementById("link-buscar").style.backgroundColor = "white";
    document.getElementById("link-buscar").style.color = "black";

    function inicio(elemento){
        document.getElementById("link-buscar").style.backgroundColor = "gray";
        document.getElementById("link-modificar").style.backgroundColor = "gray";
        document.getElementById("link-nuevo").style.backgroundColor = "gray";

        document.getElementById("link-buscar").style.color = "white";
        document.getElementById("link-modificar").style.color = "white";
        document.getElementById("link-nuevo").style.color = "white";

        elemento.style.color = "black";
        elemento.style.backgroundColor = "white";
    }
    function inicio2(){
        document.getElementById("link-buscar").style.backgroundColor = "gray";
        document.getElementById("link-modificar").style.backgroundColor = "gray";
        document.getElementById("link-nuevo").style.backgroundColor = "white";

        document.getElementById("link-buscar").style.color = "white";
        document.getElementById("link-modificar").style.color = "white";
        document.getElementById("link-nuevo").style.color = "black";
    }
</script>