<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desconectar</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        if (isset($_SESSION['usuario_validado'])) {
            session_destroy();

            print("<br><br><p align='center'>Conexión finalizada</p>\n");
            print("<p align='center'><a href='login.php'>Conectar</a></p>\n");
        } else {
            print("<br><br>\n");
            print("<p align='center'>No existe una conexión activa</p>\n");
            print("<p align='center'><a href='login.php'>Conectar</a></p>\n");
        }
    ?>
</body>
</html>