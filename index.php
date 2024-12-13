<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Таблицы истинности и сравнения</title>
</head>
<body>
    <h3>Таблица истинности</h3>
    <table class="table table-primary table-bordered">
        <thead>
            <tr>
                <th>A</th>
                <th>B</th>
                <th>!A</th>
                <th>A || B</th>
                <th>A && B</th>
                <th>A xor B</th>
            </tr>
        </thead>
        <tbody>
            <?php
                function echo_rows($x, $y) {
                    echo '<tr>';
                    echo '<td>'.$x.'</td>';
                    echo '<td>'.$y.'</td>';
                    echo '<td>'.(int)!$x.'</td>';
                    echo '<td>'.(int)($x || $y).'</td>';
                    echo '<td>'.(int)($x && $y).'</td>';
                    echo '<td>'.(int)($x xor $y).'</td>';
                    echo '</tr>';
                }

                $a = 0;
                $b = 0;
                echo_rows($a, $b);
                $b = 1;
                echo_rows($a, $b);
                $a = 1;
                $b = 0;
                echo_rows($a, $b);
                $b = 1;
                echo_rows($a, $b);
            ?>
        </tbody>
    </table>
    <hr>

    <h3>Таблица сравнения</h3>
    <h4>Гибкое сравнение</h4>

    <?php
    function echo_bool($b) {
        if ($b === true) return 'true';
        else if ($b === false) return 'false';
        else return 'null';
    }
    ?>

    <table class="table table-secondary table-bordered">
        <?php
            $values = array("", true, false, 1, 0, -1, "1", null, "php");
            for ($tr = 0; $tr<count($values); $tr++) {
                if ($tr == 0) {
                    echo '<thead>';
                    echo '<tr>';
                    echo '<td></td>';
                    for ($td = 1; $td<count($values); $td++) {
                        if ($values[$td] === true || $values[$td] === false || $values[$td] === null) 
                            echo '<th>'.echo_bool($values[$td]).'</th>';
                        else if (get_debug_type($values[$td]) == 'string') echo '<th>'.'"'.$values[$td].'"'.'</th>';
                        else echo '<th>'.$values[$td].'</th>';
                    }
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                } else {                    
                    echo '<tr>';
                    $y = $values[$tr];
                    if ($y === true || $y === false || $y === null) 
                        echo '<th>'.echo_bool($y).'</th>';
                    else if (get_debug_type($y) == 'string') 
                        echo '<th>'.'"'.$y.'"'.'</th>';
                    else echo '<th>'.$y.'</th>';
                    for ($td = 1; $td<count($values); $td++) {
                        $x = $values[$td];
                        echo '<td>'.echo_bool($x == $y).'</td>';
                    }
                    echo '</tr>';
                    
                }
            };
            echo '</tbody>';
        ?>
    </table>

    <h4>Жесткое сравнение</h4>

    <table class="table table-secondary table-bordered">
        <?php
            $values = array("", true, false, 1, 0, -1, "1", null, "php");
            for ($tr = 0; $tr<count($values); $tr++) {
                if ($tr == 0) {
                    echo '<thead>';
                    echo '<tr>';
                    echo '<td></td>';
                    for ($td = 1; $td<count($values); $td++) {
                        if ($values[$td] === true || $values[$td] === false || $values[$td] === null) 
                            echo '<th>'.echo_bool($values[$td]).'</th>';
                        else if (get_debug_type($values[$td]) == 'string') echo '<th>'.'"'.$values[$td].'"'.'</th>';
                        else echo '<th>'.$values[$td].'</th>';
                    }
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                } else {
                    echo '<tr>';
                    $y = $values[$tr];
                    if ($y === true || $y === false || $y === null) 
                        echo '<th>'.echo_bool($y).'</th>';
                    else if (get_debug_type($y) == 'string') 
                        echo '<th>'.'"'.$y.'"'.'</th>';
                    else echo '<th>'.$y.'</th>';
                    for ($td = 1; $td<count($values); $td++) {
                        $x = $values[$td];
                        echo '<td>'.echo_bool($x === $y).'</td>';
                    }
                    echo '</tr>';
                }
            };
            echo '</tbody>';
        ?>
    </table>
</body>
</html>