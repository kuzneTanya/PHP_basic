<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getPartsFromFullname(string $str) {
    $arr = explode(' ', $str);
    return [
        'surname' => $arr[0],
        'name' => $arr[1],
        'patronomyc' => $arr[2],
    ];
}

function getFullnameFromParts(string $surname, string $name, string $patronomyc) {
    return $surname.' '.$name.' '.$patronomyc;
}

function getShortName(string $str) {
    $fullname = getPartsFromFullname($str);
    return $fullname['name']." ".mb_convert_case(mb_substr($fullname['surname'], 0, 1), 0).".";
}

function getGenderFromName(string $str) {
    $fullname = getPartsFromFullname($str);
    $gender = 0;
    if (mb_substr($fullname['surname'], -2, 2) == 'ва')
        $gender++;
    else if (mb_substr($fullname['surname'], -1, 1) == 'в')
        $gender--;
    if (mb_substr($fullname['name'], -1, 1) == 'а' || mb_substr($fullname['name'], -1, 1) == 'я')
        $gender++;
    else if (mb_substr($fullname['name'], -1, 1) == 'й' || mb_substr($fullname['name'], -1, 1) == 'н' || mb_substr($fullname['name'], -1, 1) == 'л' || mb_substr($fullname['name'], -1, 1) == 'р')
        $gender--;
    if (mb_substr($fullname['patronomyc'], -3, 3) == 'вна')
        $gender++;
    else if (mb_substr($fullname['patronomyc'], -2, 2) == 'ич')
        $gender--;
    return $gender <=> 0; 
}

function getGenderDescription(array $arr) {
    $genders = [];
    foreach ($arr as $person) {
        $gender = getGenderFromName($person['fullname']);
        array_push($genders, $gender);
    }
    $men = array_filter($genders, function ($gender) {
        return $gender === -1;
    });
    $women = array_filter($genders, function ($gender) {
        return $gender === 1;
    });
    $nAGender = array_filter($genders, function ($gender) {
        return $gender === 0;
    });
    $menPersent = round(count($men)/count($genders)*100, 1);
    $womenPersent = round(count($women)/count($genders)*100, 1);
    $nAGenderPersent = round(count($nAGender)/count($genders)*100, 1);
    $genderDesc = <<<GENDERTEXT
                    <p>Гендерный состав аудитории: <hr style="border: none; border-top: 2px dashed #FFF;" /></p>
                    <p>Мужчины - $menPersent%</p>
                    <p>Женщины - $womenPersent%</p>
                    <p>Не удалось определить - $nAGenderPersent%</p>
                    GENDERTEXT;
    return $genderDesc;
}

function getPerfectPartner(string $surname, string $name, string $patronomyc, array $arr) {
    $sur = mb_strtoupper(mb_substr($surname, 0, 1)).mb_strtolower(mb_substr($surname, 1));
    $n = mb_strtoupper(mb_substr($name, 0, 1)).mb_strtolower(mb_substr($name, 1));
    $patro = mb_strtoupper(mb_substr($patronomyc, 0, 1)).mb_strtolower(mb_substr($patronomyc, 1));
    $fullname = getFullnameFromParts($sur, $n, $patro);
    $gender1 = getGenderFromName($fullname);
    if ($gender1 == 1) {
        do {
            $person = $arr[array_rand($arr, 1)];
            $gender2 = getGenderFromName($person['fullname']);
        } while ($gender2 !== -1);
    } else {
        do {
            $person = $arr[array_rand($arr, 1)];
            $gender2 = getGenderFromName($person['fullname']);
        } while ($gender2 !== 1);
    }
    $firstperson = getShortName($fullname);
    $secondperson = getShortName($person['fullname']);
    $lovepercent = rand(5000, 10000)/100;
    $result = <<<LOVEMETERTEXT
                $firstperson + $secondperson = &#9829; Идеально на $lovepercent%! &#9829;
                LOVEMETERTEXT;
    return $result;
}