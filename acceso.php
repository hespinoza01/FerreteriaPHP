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
    <link rel="icon" type="image/png" href="icons/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>Inicio</title>
</head>
<body>
    <?php
        $error_access = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            ['username' => $username, 'password' => $password] = $_POST;

            if ($username != "admin" && $password != "admin")
                $error_access = "Usuario o Contraseña es incorrecta";
            else{
                session_start();
                $_SESSION['user'] = base64_encode($username.$password);
                $_SESSION['last_access'] = time();
                header("Location: index.php");
                die();
            }
        }
    ?>
    <div class="padre">
        <form action="acceso.php" method="POST" name="newForm">
            <br>
            <h1>Ferreteria Bendición de Dios</h1>
            <h2>Bienvenido</h2>
            <img src="./icons/hombre.png" alt="" class="usuario">
            <br>
            <p style="color: rgb(255,63,63,0.7)"><?=$error_access?></p>
            <input type="text" name="username" id="user" placeholder="Usuario" required>
            <br>
            <input type="password" name="password" id="pass" placeholder="Contraseña" required>
            <br>
            <input type="submit" value="Iniciar Sesión" class="boton">
            <ul class="opciones">
                <li>Olvido su <a href="contraseña.html">Usuario/Contraseña?</a></li>
                <li><a href="cuenta.html">No posee una cuenta?</a></li>
            </ul>
        </form>

        <?php if (strlen($error_access) > 0): ?>
            <script>
                //Falta modificacion de conexion con base de datos
                document.getElementById('user').style.borderColor = 'rgb(255,63,63,0.7)';
                document.getElementById('pass').style.borderColor = 'rgb(255,63,63,0.7)';
            </script>
        <?php endif; ?>
    </div>
</body>
</html>