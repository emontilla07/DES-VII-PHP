<?php
    if (array_key_exists('enviar', $_POST)) {
        $expire = time() + 60 * 5;
        setcookie("user", $_REQUEST['visitante'], $expire);
        header("refresh:0");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13.2</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Creación de Cookies</h1>
    <h2>La cookie "User" tendra solo 5 minutos de duración</h2>

    <?php
        if (isset($_COOKIE['user'])) {
            print("<br/>Hola <b>" .$_COOKIE['user'] ."</b> gracias por visitar nuestro sitio web<br/>");
        } else {
    ?>
    
    <form action="lab132.php" method="post" name="formcookie">
        <br>Hola, primera vez que te vemos por nuestro sitio web ¿Como te llamas?
        <input type="text" name="visitante" id="visitante">
        <input type="submit" name="enviar" value="Gracias por identificarte"><br>
    </form>

    <?php
        }
    ?>
</body>
</html>