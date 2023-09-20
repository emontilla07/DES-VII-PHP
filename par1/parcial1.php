<?php
    $n = $_POST['number'];
    $matrix = [];
    $resultColumn = [];
    $resultRow = [];
    $sumaTotal = 0;
    
    echo '<table border=1>';
        for ($i = 1; $i <= $n; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $n; $j++) {
                if (($i == floor(($n / 2) + 1)) || ($j == floor(($n / 2) + 1))) {
                    $matrix[$i][$j] = rand(1, 100);
                    echo '<td>', $matrix[$i][$j], '</td>';
                } else {
                    echo '<td>', 0, '</td>';
                }
            }
            echo '</tr>';
        }
    echo '</table>';

    $resultColumn = array_map('array_sum', $matrix);
    $sumaTotal = array_sum($resultColumn);

    echo "<br> La suma de la matriz es = $sumaTotal";
?>