<?php

spl_autoload_register('autoloader');

autoloader('calculator.php');
autoloader('validator.php');

foreach (glob("operations\class_*.php") as $filename) {
    autoloader($filename);
}

foreach (glob("validations\class_*.php") as $filename) {
    autoloader($filename);
}

function autoloader($fileurl) {
    include $fileurl;
}
