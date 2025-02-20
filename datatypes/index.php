<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Типы данных</title>
    <?php include 'func.php';?>
</head>
<body>
    <div class="firsttable">
        <h3>Массив данных</h3>
        
        <table class="table table-primary table-bordered" style="width: fit-content;" id="nameTable">
            <thead>
                <tr>
                    <th>Полное имя</th>
                    <th>Должность</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($example_persons_array as $person) {
                    echo '<tr class="person">';
                    echo '<td>'.$person['fullname'].'</td>';
                    echo '<td>'.$person['job'].'</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="buttons">
        <button class="btn btn-dark" id="divName">Разделить ФИО</button>
        <button class="btn btn-dark" disabled id="mergeName">Объединить ФИО</button>
    </div> -->

    <div class="secondtable">
        <h3 id="partstart" data-bs-toggle="#parttable" role="button" aria-expanded="false">Разделение ФИО</h3>
        <div class="collapse" id="parttable">
            <table class="table table-primary table-bordered" style="width: fit-content;">
                <thead>
                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Должность</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $div_persons_array = [];
                foreach ($example_persons_array as $person) {
                    $fullname = getPartsFromFullname($person['fullname']);
                    echo '<tr>';
                    echo '<td>'.$fullname['surname'].'</td>';
                    echo '<td>'.$fullname['name'].'</td>';
                    echo '<td>'.$fullname['patronomyc'].'</td>';
                    echo '<td>'.$person['job'].'</td>';
                    echo '</tr>';
                    $div_peron = [
                        'fullname' => $fullname,
                        'job' => $person['job']
                    ];
                    array_push($div_persons_array, $div_peron);
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mergeName">
        <h3 id="mergestart" data-bs-toggle="#mergetable" role="button" aria-expanded="false">Объединение ФИО</h3>
        <div class="collapse" id="mergetable">
            <table class="table table-primary table-bordered" style="width: fit-content;">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Должность</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($div_persons_array as $person) {
                    $fullname = getFullnameFromParts($person['fullname']['surname'], $person['fullname']['name'], $person['fullname']['patronomyc']);
                    echo '<tr>';
                    echo '<td>'.$fullname.'</td>';
                    echo '<td>'.$person['job'].'</td>';
                    echo '</tr>';
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="shortName">
        <h3 id="shortstart" data-bs-toggle="#shorttable" role="button" aria-expanded="false">Сокращение ФИО</h3>
        <div class="collapse" id="shorttable">
            <table class="table table-primary table-bordered" style="width: fit-content;">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Должность</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($example_persons_array as $person) {
                    $name = getShortName($person['fullname']);
                    echo '<tr>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$person['job'].'</td>';
                    echo '</tr>';
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="gender_Table">
        <h3 id="genderstart" data-bs-toggle="#gendertable" role="button" aria-expanded="false">Определение пола по ФИО</h3>
        <div class="collapse" id="gendertable">
            <table class="table table-primary table-bordered" style="width: fit-content;">
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Пол</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($example_persons_array as $person) {
                    $genderNum = getGenderFromName($person['fullname']);
                    if ($genderNum === 1) $gender = 'Женский'; 
                    else if ($genderNum === -1) $gender = 'Мужской';
                    else $gender = 'Не определен'; 
                    echo '<tr>';
                    echo '<td>'.$person['fullname'].'</td>';
                    echo '<td>'.$person['job'].'</td>';
                    echo '<td>'.$gender.'</td>';
                    echo '</tr>';
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="gender_Stat">
        <h3 id="genderStatstart" data-bs-toggle="#genderstat" role="button" aria-expanded="false">Гендерный состав аудитории</h3>
        <div class="collapse" id="genderstat">
            <div class="genStatText text-bg-secondary">
                <?php
                $genderStat = getGenderDescription($example_persons_array);
                echo $genderStat;
                ?>
            </div>
        </div>
    </div>

    

    <div class="love_Meter">
        <h3 id="loveMeterstart" data-bs-toggle="#loveMeter" role="button" aria-expanded="false">Подбор пары</h3>
        <div class="collapse" id="loveMeter">
            <div class="text-bg-success" id="loveMeterOutput">
                <?php
                    $names = [];
                    foreach ($example_persons_array as $person) {
                        array_push($names, $person['fullname']);
                    }
                    do {
                        $firstPerson = getPartsFromFullname($names[array_rand($names, 1)]);
                    } while (getGenderFromName(implode(' ', $firstPerson)) == 0);
                    $loveResult = getPerfectPartner($firstPerson['surname'], $firstPerson['name'], $firstPerson['patronomyc'], $example_persons_array);
                    echo $loveResult;
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>