<?php
session_start();

$img = imagecreatetruecolor(500, 300);
imagefilledrectangle($img, 0, 0, 0, 0, imagecolorallocate($img, 255, 255, 255));
imagettftext($img, 30, 0, 10, 30, imagecolorallocate($img, 255, 255, 0), 'font.otf', '&#1044;&#1080;&#1087;&#1083;&#1086;&#1084;');
imagettftext($img, 26, 0, 10, 100, imagecolorallocate($img, 255, 255, 0), 'font.otf', 'Javascript &#1088;&#1072;&#1079;&#1088;&#1072;&#1073;&#1086;&#1090;&#1095;&#1080;&#1082;');
imagettftext($img, 30, 0, 10, 170, imagecolorallocate($img, 255, 255, 0), 'font.otf', $_GET['name']);
imagettftext($img, 30, 0, 10, 240, imagecolorallocate($img, 255, 255, 0), 'font.otf', '&#1054;&#1094;&#1077;&#1085;&#1082;&#1072; - ' . $_SESSION['count_success']);

header('Expires: Wed, 1 Jan 1997 00:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header ('Content-type: image/gif');
imagegif($img);
imagedestroy($img);

?>