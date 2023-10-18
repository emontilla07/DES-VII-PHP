<?php
    session_start();

    if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {
        $usuario = $_REQUEST['usuario'];
        $clave = $_REQUEST['clave'];

        $salt = substr($usuario, 0, 2);
        $clave_crypt = crypt($clave, $salt);

        require_once('class/usuarios.php');

        $obj_usuario = new Usuarios();
        $usuario_validado = $obj_usuario->validarUsuario($usuario, $clave_crypt);

        foreach ($usuario_validado as $array_resp) {
            foreach ($array_resp as $value) {
                $nfilas = $value;
            }
        }

        if ($nfilas > 0) {
            $usuario_validado = $usuario;
            $_SESSION['usuario_valido'] = $usuario_validado;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14 - Login al sitio de noticias</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        // sesión iniciada
        if (isset($_SESSION['usuario_validado'])) {
    ?>
    <h1>Gestión de Noticias</h1>
    <hr>
    <ul>
        <li><a href="lab142.php">Listar todas las noticias</a></li>
        <li><a href="lab143.php">Listar noticias por partes</li>
        <li><a href="lab144.php">Buscar noticias</li>
    </ul>
    <hr>
    <p><a href="logout.php">Desconectar</a></p>
    <?php
        }

        // Intento de entrada fallido
        else if (isset($usuario)) {
            print("<br><br>\n");
            print("<p align='center'>Acceso no autorizado</p>\n");
            print("<p align='center'><a href='login.php'>Conectar</a></p>\n");
        } else {   // Sesíon no iniciada
            print("<br><br>\n");
            print("<p class='parrafocentrado'>Esta zona tiene el acceso restringido.<br> " .
                " Para entrar debe identificarse</p>");
            print("<form class='entrada' name='login' action='login.php' method='post'>\n");
                print("<p><label class='etiqueta-entrada'>Usuario: </label>\n");
                print("<input type='text' name='usuario' size='15'></p>\n");
                print("<p><label class='etiqueta-entrada'>Clave: </label>\n");
                print("<input type='password' name='clave' size='15'></p>\n");
                print("<p><input type='submit' value='Entrar' name='entrar'></p>\n");
            print("</form>\n");
            print("<p class='parrofocentrado'>NOTA: si no dispone de identificación o tiene problemas " .
                 "para entrar<br>pongase en contacto con el " .
                 "<a href='mailto:webmaster@localhost'>Administrador</a> del sitio</p>\n");
        }
    ?>
</body>
</html>