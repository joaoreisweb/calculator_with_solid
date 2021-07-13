<?php

require 'calculator.php';
require 'validator.php';

foreach (glob("operations\class_*.php") as $filename) {
    include_once $filename;
}

foreach (glob("validations\class_*.php") as $filename) {
    include_once $filename;
}

