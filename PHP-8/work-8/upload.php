<?php
if($_FILES['test']['type'] == 'application/octet-stream'){
    $filelist = glob("tests/*.json");
    if (!$filelist) {
        copy($_FILES['test']['tmp_name'], "tests/test-1.json");
    }else{
        $first = array_reverse($filelist)[0];
        preg_match("|[0-9]|U", $first, $out);
        copy($_FILES['test']['tmp_name'], "tests/test-" . ($out[0] + 1) . ".json");
    }
	header('location: http://university.netology.ru/user_data/plyakin/work-8/list.php');
}else{
	header('location: http://university.netology.ru/user_data/plyakin/work-8/admin.php?err=true');
}