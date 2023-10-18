<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12.3</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Manejo de Sesiones</h1>
    <h2>Paso 3: la variable ya a sido destruida y su valor se a perdido</h2>

    <?php
        if (isset($_SESSION['var'])) {
            $var = $_SESSION['var'];
        } else {
            $var = "";
        }

        print("<p>Valor de la variable de sesión: $var</p>\n");
        session_destroy();
    ?>

    <a href="lab121.php">Volver al paso 1</a>
</body>
</html>