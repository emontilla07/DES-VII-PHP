<?php
    $number1 = $_REQUEST['number1'];
    $result = 1;

    for ($i = 1; $i <= $number1; $i++) {
        $result *= $i;
    }

    echo "El valor factorial del número $number1 es igual a $result";
?>