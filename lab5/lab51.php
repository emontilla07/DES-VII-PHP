<?php
    if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
        $nombreDirectorio = "archivos/";
        $nombreArchivo = $_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto = $nombreDirectorio . $nombreArchivo;

        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreArchivo = $idUnico . "-" . $nombreArchivo;
            echo "Nombre repetido, se cambiara el nombre a $nombreArchivo <br><br>";
        }

        move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombreArchivo);

        echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
    } else {
        echo "No se ha podido subir el archivo <br>";
    }
?>