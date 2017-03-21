<?php


require __DIR__ . '/vendor/autoload.php';

$api = new \Yandex\Geo\Api();

$address = !empty($_GET['address']) ? $_GET['address'] : '';
$api->setQuery($address);

$api
    ->setLang(\Yandex\Geo\Api::LANG_RU)
    ->load();

$response = $api->getResponse();


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>
<body>
<form style="float: left">

    <label> Адрес <br>
        <input type="text" name="address">
    </label>
    <input type="submit" value="Найти">
</form>

<br><br><br>
<div style="float: left">
    <?php
    $collection = $response->getList();
    foreach ($collection as $item) {
        echo '<button onclick="check_map_picker([' . $item->getLatitude() . ',' . $item->getLongitude() . '])">';
        echo $item->getLatitude();
        echo ', ';
        echo $item->getLongitude();
        echo '</button><br><br>';

    }
    ?>
</div>

<div id="map" style="width: 600px; height: 400px; float: right;"></div>
<script type="text/javascript">
    ymaps.ready(function () {
        init([59.814346, 30.301046]);
    });

    var map;
    var myPlacemark;

    function init(coordinates) {
        map = new ymaps.Map("map", {
            center: coordinates,
            zoom: 7
        });

        myPlacemark = new ymaps.Placemark(coordinates);
        map.geoObjects.add(myPlacemark);
    }
    function check_map_picker(coordinates) {
        map.destroy();
        init(coordinates)
    }
</script>
</body>
</html>


