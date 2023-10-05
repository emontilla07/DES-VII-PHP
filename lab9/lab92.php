<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 9.2</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <form name="Formulario" method="post" action="lab92.php">
        <br>
        Filtrar por: <select name="campos">
            <option value="texto" SELECTED>Descripción</option>
            <option value="titulo">Título</option>
            <option value="categoria">Categoria</option>
        </select>
        con el valor
        <input type="text" name="valor">
        <input type="submit" value="Filtrar Datos" name="ConsultarFiltro">
        <input type="submit" value="Ver todos" name="ConsultarTodos">
    </form>

    <?php
        require_once('class/noticias.php');

        $obj_noticias = new Noticias();
        $noticias = $obj_noticias->consultarNoticias();

        if (array_key_exists('ConsultarTodos', $_POST)) {
            $obj_noticias = new Noticias();
            $noticiasNew = $obj_noticias->consultarNoticias();
        }

        if (array_key_exists('ConsultarFiltro', $_POST)) {
            $obj_noticias = new Noticias();
            $noticias = $obj_noticias->consultarNoticiasFiltro($_REQUEST['campos'], $_REQUEST['valor']);
        }

        $nFilas = count($noticias);


        if ($nFilas > 0) {
            print ("<table>\n");
                print ("<tr>\n");
                    print ("<th>Título</th>\n");
                    print ("<th>Texto</th>\n");
                    print ("<th>Categoria</th>\n");
                    print ("<th>Fecha</th>\n");
                    print ("<th>Imagen</th>\n");
                print ("</tr>\n");

            foreach($noticias as $resultado) {
                print ("<tr>\n");
                    print ("<td>" . $resultado['titulo'] . "</td>\n");
                    print ("<td>" . $resultado['texto'] . "</td>\n");
                    print ("<td>" . $resultado['categoria'] . "</td>\n");
                    print ("<td>" . date("j/n/y".strtotime($resultado['titulo'])) . "</td>\n");

                    if ($resultado['imagen'] != "") {
                        print ("<td><a target='_blank' href='img/" . $resultado['imagen'] ."'><img border='0' src='iconotexto.gif'></a></td>\n");
                    } else {
                        print ("<td>&nbsp</td>\n");
                    }
                print ("</tr>");
            }
            print ("</table>\n");
        } else {
            print ("No hay noticias disponibles");
        }
    ?>
</body>
</html>