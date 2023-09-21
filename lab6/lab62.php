<?php
    require("class_lib.php");

    // Instanciamos un par de objetos cliente
    $cliente1 = new Cliente("Pepé", 1);
    $cliente2 = new Cliente("Roberto", 564);

    // Mostramos el número de cada cliente creado
    echo "<br>El identificador del cliente 1 es: " . $cliente1->dame_numero();
    echo "<br>El identificador del cliente 2 es: " . $cliente2->dame_numero();
?>