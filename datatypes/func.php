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

function getPartsFromFullname($str) {
    $arr = explode(' ', $str);
    return [
        'surname' => $arr[0],
        'name' => $arr[1],
        'patronomyc' => $arr[2],
    ];
}

function getFullnameFromParts($arr) {
    return implode(' ', $arr);
}

function getShortName($str) {
    $fullname = getPartsFromFullname($str);
    return $fullname['name']." ".mb_convert_case(mb_substr($fullname['surname'], 0, 1), 0).".";
}

function getGenderFromName($str) {
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
    if (($gender <=> 0) === 1) return 'Женский'; 
    else if (($gender <=> 0) === -1) return 'Мужской'; 
    else return 'Не определен'; 
}

function getGenderDescription($arr) {
    foreach ($arr as $person) {
        $gender = getGenderFromName($person['fullname']);
        array_push($genders, $gender);
    }
    $men = array_filter($genders, function ($gender) {
        return $gender === 'Мужской';
    });
    $women = array_filter($genders, function ($gender) {
        return $gender === 'Женский';
    });
    $nAGender = array_filter($genders, function ($gender) {
        return $gender === 'Не определен';
    });
    $menPersent = count($men)/count($genders)*100;
    $womenPersent = count($women)/count($genders)*100;
    $nAGenderPersent = count($nAGender)/count($genders)*100;
    $genderDesc = [
        'Мужчины' => $menPersent,
        'Женщины' => $womenPersent,
        'Неопределенный' => $nAGenderPersent,
    ];
    return $genderDesc;
}

function getPerfectPartner() {

}