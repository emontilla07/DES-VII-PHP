<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 11.1</title>
</head>
<body>
    <h1>Consulta de noticias</h1>

    <!-- Siguiente y anterior -->
    <div class="paginacion">
        <a href="LAB111.php?inicio=0&fin=5">[ Anterior | </a>
        <a href="LAB111.php?inicio=5&fin=7">Siguiente ]</a>
    </div>


<?php

    require_once('class/noticias.php');
    error_reporting(0);
    $obj_noticias = new noticias();
    $inicio = $_GET['inicio'];
    $fin = $_GET['fin'];

    //cargar noticias de la 1 a la 5 por defecto
    if ($inicio == null && $fin == null) {
        $inicio = 0;
        $fin = 5;
    }

    $noticia = $obj_noticias->consultar_noticias_paginacion($inicio, $fin);

    echo "<p>Mostrando noticias del ".$inicio +1 ." al ".$fin." de un total de 7</p>";

    $nfilas = count($noticia);

    if ($nfilas > 0) {
        print("<table>\n");
        print("<tr>\n");
        print("<th>Titulo</th>\n");
        print("<th>Texto</th>\n");
        print("<th>Categoria</th>\n");
        print("<th>Fecha</th>\n");
        print("<th>Imagen</th>\n");
        print("</tr\n");

        foreach($noticia as $resultado){
            print("<tr>\n");
            print("<td>".$resultado['titulo']."</td>\n");
            print("<td>".$resultado['texto']."</td>\n");
            print("<td>".$resultado['categoria']."</td>\n");
            print("<td>".date("j/n/y", strtotime($resultado['fecha']))."</td>\n");

            if ($resultado['imagen'] != "") {
                print("<td><a target='_blank' href='img/".$resultado['imagen']."'>
                <img border='0' src='img/iconotexto.gif'></a></td>\n");
            } else {
                print("<td>&nbsp;</td>\n");
            }
            print("</tr\n");
        }
        print("</table>\n");
    } else {
        print("No hay noticias disponibles");
    }

?>
    
</body>
</html>