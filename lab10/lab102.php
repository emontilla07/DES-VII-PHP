<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.2</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Encuesta. Resultados de la votación</h1>

    <?php
        require_once('class/votos.php');

        $obj_votos = new Votos();
        $result_votos = $obj_votos->listarVotos();

        foreach($result_votos as $result_voto) {
            $votos1 = $result_voto['votos1'];
            $votos2 = $result_voto['votos2'];
        }

        $totalVotos = $votos1 + $votos2;

        print("<table>\n");
            print("<tr>\n");
                print("<th>Respuesta</th>\n");
                print("<th>Votos</th>\n");
                print("<th>Porcentaje</th>\n");
                print("<th>Representación Grafica</th>\n");
            print("</tr>\n");
            $porcentaje = round(($votos1 / $totalVotos) * 100, 2);
            print("<tr>\n");
                print("<td class='izquierda'>Si</td>\n");
                print("<td class='derecha'>$votos1</td>\n");
                print("<td class='derecha'>$porcentaje</td>\n");
                print("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' width='$porcentaje' height='10'></td>\n");
            print("</tr>\n");
            $porcentaje = round(($votos2 / $totalVotos) * 100, 2);
            print("<tr>\n");
                print("<td class='izquierda'>No</td>\n");
                print("<td class='derecha'>$votos2</td>\n");
                print("<td class='derecha'>$porcentaje</td>\n");
                print("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' width='$porcentaje' height='10'></td>\n");
            print("</tr>\n");
        print("</table>\n");

        print("<p>Números total de votos emitidos: $totalVotos</p>\n");
        print("<a href='lab101.php'>Página de votacíon</a>\n");
    ?>
</body>
</html>