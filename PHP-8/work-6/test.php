<?php

$test = file_get_contents('http://university.netology.ru/user_data/plyakin/work-6/tests/test-' . $_GET['file'] . '.json' );
$json = json_decode($test);
if(empty(json_decode($test))) {
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TEST</title>
</head>
<body>
    <form action="http://university.netology.ru/user_data/plyakin/work-6/checkTest.php" method="post">
        <?php
            foreach((array)$json as $key => $question){
                ?>
                    <label><?= $question->question ?></label>
                    <input type="text" name="<?= $key ?>"><br>
                <?php
            }
        ?><br>
        <input type="hidden" name="json" value='<?= $_GET['file'] ?>'>
        <input type="submit" value="проверить результаты">
    </form>
</body>
</html>