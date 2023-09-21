<?php
    require("class_lib.php");

    // Ejemplo de uso de la clase padre
    $soporte = new Soporte("The Soccer Game", 22, 3);

    echo "<b>" . $soporte->titulo . "</b>";
    echo "<br>Precio: " . $soporte->dame_precio_sin_itbm() . " dolares";
    echo "<br>Precio ITBM incluido: " . $soporte->dame_precio_con_itbm() . " dolares";

    // Ejemplo de uso de la clase hija #1
    $video = new Video("Los Otros", 22, 4.5, "115 minutos");

    echo "<br><br>";
    echo "<b>" . $video->titulo . "</b>";
    echo "<br>Precio: " . $video->dame_precio_sin_itbm() . " dolares";
    echo "<br>Precio ITBM incluido: " . $video->dame_precio_con_itbm() . " dolares";
    echo "<br>" . $video->imprime_caracteristicas();

    // Ejemplo de uso de la clase hija #2
    $juego = new Juego("Pes 18", 21, 2.5, "XBOX 360", 1, 2);
    $juego->imprime_caracteristicas();
    $juego->imprime_jugadores_posibles();

    echo "<P>";

    $juego2 = new Juego("Fifa 18", 27, 3, "PS 4", 1, 2);
    echo "<b>" . $juego2->titulo . "</b>";
    $juego2->imprime_jugadores_posibles();
?>