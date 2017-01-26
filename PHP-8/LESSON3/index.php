<?php
$coutryOfAnimals = [
    'Africa' => [
        'Верблюд Дромедар',
        'Носорог Белый',
        'Крокодил',
        'Гепард',
        'Окапи',
        'Антилопа Гну'
    ],
    'Brazil' => [
        'Бразильская Капибара',
        'Лесная Мышь',
        'Полевой Олень',
        'Анаконда',
        'Муравьед',
        'Леопард',
        'Пантера'
    ],
    'America' => [
        'Американская Норка',
        'Волк',
        'Песец',
        'Девятипоясный Броненосец',
        'Росомаха',
        'Пума'
    ]
];
$animalsTwoWords = [];
foreach ($coutryOfAnimals as $key => $massAnimals) {
    foreach ($massAnimals as $animal) {
        if (strpos($animal, ' ')) {
            $animalExp = explode(' ', $animal);
            $animalsTwoWords[][$key] = $animalExp[0];
            $animalsTwoWords[][$key] = $animalExp[1];
        }
    }
}
shuffle($animalsTwoWords);

$fantazyMass = [];
for ($index = 0; $index < count($animalsTwoWords); $index += 2) {
    $fantazyMass[key($animalsTwoWords[$index])][] = current($animalsTwoWords[$index]) . ' ' . current($animalsTwoWords[$index + 1]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лекция №2. Список животных</title>
</head>
<body>
<h1>Список фантазийных животных</h1>
<?php
foreach ($fantazyMass as $key => $value) {
    echo "<h2>$key</h2>";
    echo implode(', ', $value);
}
?>
</body>
</html>