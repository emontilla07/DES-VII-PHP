<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 2.4</title>
</head>
<body>
    <?php
        // Creacion del arreglo array ("clave" => "valor")
        $personas = array(
            "Juan" => "Panamá",
            "John" => "USA",
            "Eica" => "Finlandia",
            "Kusanagi" => "Japon"
        );

        // Recorrer todo el arreglo
        foreach($personas as $persona => $pais) {
            print "$persona es de $pais<br>";
        }

        // Impresion especifica
        echo "<br>".$personas["Juan"];
        echo "<br>".$personas["Eica"];
    ?>
</body>
</html>