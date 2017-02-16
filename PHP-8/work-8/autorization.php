<?php
session_start();

function errLoginAdmin() {
	if(!empty($_SESSION['ERR_COUNT']) and $_SESSION['ERR_COUNT'] >= 1){
		if($_SESSION['ERR_COUNT'] < 5) $_SESSION['ERR_COUNT']++;
		else {
			$_SESSION['ERR_COUNT'] = 0;
			SetCookie("Ban", date('Y-m-d', time() + 3600 ), time() + 3600);
		}
	}else $_SESSION['ERR_COUNT'] = 1;
	header('location:' . $_SERVER['HTTP_REFERER'] .'');
}
function autorizeAdmin(){
	$_SESSION['TYPE'] = 'admin';
	$_SESSION['NAME'] = $_POST['login'];
	header('location:http://university.netology.ru/user_data/plyakin/work-8/admin.php');
}

if (!empty($_POST['type']) and $_POST['type'] == 'admin') {
    $json = file_get_contents($_POST['login'] . '.json');
    $password = json_decode($json)->password;
    if($password == $_POST['password']){
		if(isset($_SESSION['ERR_COUNT'])){
			if($_POST['captcha'] == '8AnF'){
				$_SESSION['ERR_COUNT'] = 0;
				autorizeAdmin();
			}else{
				errLoginAdmin();
			}
		}else {
			autorizeAdmin();
		}        
    }else {		
        errLoginAdmin();
	}
}else if (!empty($_POST['type']) and $_POST['type'] == 'guest') {    
    $_SESSION['TYPE'] = 'guest';
    $_SESSION['NAME'] = $_POST['name'];
    header('location:http://university.netology.ru/user_data/plyakin/work-8/list.php');
}else if (!empty($_GET['logout'])) {
    session_unset();
    header('location:http://university.netology.ru/user_data/plyakin/work-8/index.php');
}else{
    header('location:http://university.netology.ru/user_data/plyakin/work-8/index.php');	
}
