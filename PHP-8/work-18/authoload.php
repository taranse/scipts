<?php

function autoloadClasses($className)
{
    $filePath = $className . '.php';
    if (file_exists($filePath)) {
        include "$filePath";
    }
}

spl_autoload_register('autoloadClasses');
