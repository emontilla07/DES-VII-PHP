<?php
    $host = 'localhost';
    $db_name = 'app_project';
    $user_name = 'root';
    $password = '';

    try {
        $conection = new PDO("mysql:host=$host;dbname=$db_name", $user_name, $password);
    } catch(PDOException $ex) {
        echo "Error de conexión de base de datos " . $ex->getMessage();
    }
?>