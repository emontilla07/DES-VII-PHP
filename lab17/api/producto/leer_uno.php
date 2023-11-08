<?php
    // encabezados obligatorios
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credential: true");
    header("Content-Type: application/json");

    // incluir archivos de conexion y objetos
    include_once("../configuracion/conexion.php");
    include_once("../objetos/producto.php");

    // obtener conexion a la base de datos
    $conex = new Conexion();
    $db = $conex->obtenerConexion();

    // preparar el objeto de producto
    $producto = new Producto($db);

    // set ID property of record to read
    $producto->id = isset($_GET['id']) ? $_GET['id'] : die();

    // leer los detalles del productor editar
    $producto->readOne();

    if ($producto->nombre != null) {
        // creacion del arreglo
        $product_arr = array(
            "id" => $producto->id,
            "nombre" => $producto->nombre,
            "descripcion" => $producto->descripcion,
            "precio" => $producto->precio,
            "categoria_id" => $producto->categoria_id,
            "categoria_desc" => $producto->categoria_desc
        );

        // asignar código de respuesta -200
        http_response_code(200);

        // mostrar en formato json
        echo json_encode($product_arr);
    }
?>