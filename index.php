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
            <tr>
                <td>
                    <?= $a = 0;?>
                </td>
                <td>
                    <?= $b = 0;?>
                </td>
                <td>
                    <?= (int)!$a;?>
                </td>
                <td>
                    <?= (int)($a || $b);?>
                </td>
                <td>
                    <?= (int)($a && $b);?>
                </td>
                <td>
                    <?= (int)($a xor $b);?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $a = 0;?>
                </td>
                <td>
                    <?= $b = 1;?>
                </td>
                <td>
                    <?= (int)!$a;?>
                </td>
                <td>
                    <?= (int)($a || $b);?>
                </td>
                <td>
                    <?= (int)($a && $b);?>
                </td>
                <td>
                    <?= (int)($a xor $b);?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $a = 1;?>
                </td>
                <td>
                    <?= $b = 0;?>
                </td>
                <td>
                    <?= (int)!$a;?>
                </td>
                <td>
                    <?= (int)($a || $b);?>
                </td>
                <td>
                    <?= (int)($a && $b);?>
                </td>
                <td>
                    <?= (int)($a xor $b);?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $a = 1;?>
                </td>
                <td>
                    <?= $b = 1;?>
                </td>
                <td>
                    <?= (int)!$a;?>
                </td>
                <td>
                    <?= (int)($a || $b);?>
                </td>
                <td>
                    <?= (int)($a && $b);?>
                </td>
                <td>
                    <?= (int)($a xor $b);?>
                </td>
            </tr>
        </thead>
    </table>
</body>
</html>