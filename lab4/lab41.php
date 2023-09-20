<?php
    $_number1 = $_REQUEST['number1'];

    if ($_number1 >= 80) {
        echo "Atención Excelente";
        echo "<br> <img style='width: 200' src='img/good.png' alt='carita feliz'>";
    } elseif ($_number1 >= 50 && $_number1 <= 79) {
        echo "Atención Regular";
        echo "<br> <img style='width: 200' src='img/medium.png' alt='carita regular'>";
    } else {
        echo "Atención Pesima";
        echo "<br> <img style='width: 200' src='img/bad.png' alt='carita triste'>";
    }
?>