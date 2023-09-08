<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 2.7</title>
</head>
<body>
    <?php
        $posicion = "arriba";

        switch ($posicion) {
            case "arriba":
                echo "La variable contiene";
                echo "el valor arriba";
                break;
            case "abajo":
                echo "La variable contiene";
                echo "el valor abajo";
                break;
            default:
                echo "La variable contiene otro valor";
                echo "distinto a arriba y abajo";
        }
    ?>
</body>
</html>