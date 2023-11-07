<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 15.1 - Ejemplo DataTable JQuery</title>
    <link rel="stylesheet" href="js/jquery.dataTables.min.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
</head>
<body>
<script>
        $(document).ready(function() {
            $('#grid').DataTable({
                "lengthMenu": [5, 10, 20, 50],
                "order": [[0, "asc"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No existen resultados en su busqueda",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Buscando entre _MAX_ registros en total)",
                    "search": "Buscar ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                } 
            });

            $("*").css("font-family", "arial").css("font-size", "12px");
        });
    </script>
    <h1>Consulta de noticias</h1>

    <?php
        require_once('class/noticias.php');

        $obj_noticias = new Noticias();
        $noticias = $obj_noticias->consultarNoticias();
        $nFilas = count($noticias);

        if ($nFilas > 0) {
            print ("<table id='grid' class='display' cellspacing='0'>\n");
                print("<thead>\n");
                    print ("<tr>\n");
                        print ("<th>Título</th>\n");
                        print ("<th>Texto</th>\n");
                        print ("<th>Categoria</th>\n");
                        print ("<th>Fecha</th>\n");
                        print ("<th>Imagen</th>\n");
                    print ("</tr>\n");
                print("</thead>\n");

                print("<tbody>\n");
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
                print("</tbody>\n");
            }
            print ("</table>\n");
        } else {
            print ("No hay noticias disponibles");
        }
    ?>
</body>
</html>