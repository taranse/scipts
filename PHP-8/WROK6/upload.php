<?php
if($_FILES['test']['type'] == 'application/octet-stream'){
	copy($_FILES['test']['tmp_name'], "tests/".basename($_FILES['test']['name']));
	header('location: http://university.netology.ru/user_data/plyakin/work-6/list.php');
}else{
	header('location: http://university.netology.ru/user_data/plyakin/work-6/admin.php?err=true');
}