<link rel="stylesheet" href="css/user.css">

<section class="contenido">
<div id="buscar" class="table-container paquete1">
    <h2><strong>Miembros del Staff</strong></h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puesto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Keyling Brigitte Rojas Gomez</td>
                <td>Administrador</td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Veronica Paola Arroliga Garcia</td>
                <td>Cajero</td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Julio Moises Moreira Benavides</td>
                <td>Vendedor</td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Marcos Antonio Jalinas Hernandez</td>
                <td>Bodeguero</td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
            <tr>
                <td>Eli Josue Vallejos Toruño</td>
                <td>Jefe de Ventas</td>
                <td><button><i class="fas fa-users-cog"></i>Modificar</button></td>
                <td><button><i class="fas fa-trash"></i>Desactivar</button></td>
            </tr>
        </tbody>
    </table>
</div>

<div id="nuevo" class="form-container paquete2">
    <h2><strong>Datos del Nuevo Miembro</strong></h2>
    <form action="" style="transform: translateX(1rem);">
        <label for="">Nombres:</label><br>
        <input type="text" value="" placeholder="Primer Nombre" required>
        <input type="text" value="" placeholder="Segundo Nombre" required><br>
        <label for="">Apellidos:</label><br>
        <input type="text" value="" placeholder="Primer Apellido" required>
        <input type="text" value="" placeholder="Segundo Apellido" required><br>
        <label for="">Correo electronico:</label><br>
        <input type="email" name="" id="" placeholder="Email" required><br>
        <label for="">Puesto:</label><br>
        <div class="select">
            <select name="" id="" required>
                <option value="0" selected disabled>Puesto de Trabajo:</option>
                <option value="1">Administrador</option>
                <option value="2">Jefe de Ventas</option>
                <option value="3">Vendedor</option>
                <option value="4">Bodeguero</option>
                <option value="5">Cajero</option>
            </select>
        </div> <br>
        <button type="submit"><i class="fas fa-save"></i>Guardar</button>
        <button class="cancelar"><i class="fas fa-angle-right"></i>Cancelar</button><br>
        <p class="msg"><i><strong>La contraseña se genera por defecto y solo puede ser modificada por el usuario.</strong></i></p>
    </form>
</div>
</section>