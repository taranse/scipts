<?php

$filename = dirname(__FILE__) . '/tests/test-' . $_GET['file'] . '.json';
if ( !(unlink($filename)) ) die('Error Delete File.');
else header('location: '. $_SERVER['HTTP_REFERER']);