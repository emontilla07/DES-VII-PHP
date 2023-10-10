<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.1</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        require_once('class/votos.php');

        if (array_key_exists('enviar', $_POST)) {
            print("<h1>Encuesta, Votos registrado</h1>\n");

            $obj_votos = new Votos();

            $result_votos = $obj_votos->listarVotos();

            foreach($result_votos as $result_voto) {
                $votos1 = $result_voto['votos1'];
                $votos2 = $result_voto['votos2'];
            }

            $voto = $_REQUEST['voto'];

            if ($voto == "si")
                $votos1 += 1;
            else
                $votos2 += 1;

            $obj_votos = new Votos();
            $result = $obj_votos->actualizarVotos($votos1, $votos2);

            if ($result) {
                print("<p>Su voto a sido registrado. Gracias por su participación</p>\n");
                print("<a href='lab102.php'>Ver Resultados</a>\n");
            } else {
                print("<a href='lab101.php'>Error al actualizar su voto</a>\n");
            }
        } else {
    ?>

    <h1>Encuesta</h1>

    <p>¿Cree usted, que el precio de la vivienda seguira subiendo al ritmo actual?</p>

    <form action="lab101.php" method="post">
        <input type="radio" name="voto" value="si" checked>Si<br>
        <input type="radio" name="voto" value="no">No<br>
        <input type="submit" name="enviar" value="Votar">
    </form>

    <a href="lab102.php">Ver Resultados</a>

    <?php
        }
    ?>
</body>
</html>