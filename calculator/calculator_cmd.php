<?php

declare(strict_types=1);
include 'includes/autoloader.inc.php';

// use calculator\operations\Divison;
// use calculator\operations\Addition;
// use calculator\operations\Multiplication;
// use calculator\operations\Subtraction;
use calculator\validations\ValidateSimpleEquation;

///// CONVERT ARGUMENT VALUES
if (defined('STDIN')) {
    array_shift($argv);
    foreach ($argv as $arg) {
        $e = explode("=", $arg);
        $_GET[$e[0]] = $e[1];
    }
}

$val1 = isset($_GET['v1']) ? $_GET['v1'] : '';
$val2 = isset($_GET['v2']) ? $_GET['v2'] : '';
$operator = isset($_GET['o']) ? $_GET['o'] : '';
$equation = isset($_GET['e']) ? $_GET['e'] : '';

if (($val1 != '' && $val2 != '' && $operator != '') || $equation != '') {
    echo 'result:' . "\xA";
} else {
    echo 'Invalid values! ';
}

$string_equation = $result_equation = '';
$operators = ['+','-','/','*']; /// exercise valid operators
$actions = ['Addition', 'Subtraction', 'Divison', 'Multiplication'];

if ($val1 != '' && $val2 != '' && $operator != '') {
    $string_equation = $val1 . '' . $operator . '' . $val2;
 }

if ($equation != '') {

    $validator = new Validator();
    $matches = $validator->getResult(new ValidateSimpleEquation($equation, $operators));

    if(count($matches)>=4){
        $string_equation=$matches[0];
        $val1 = $matches[1];
        $operator = $matches[2];
        $val2 = $matches[3];
    }
}

if ($string_equation != '') {

    $calc = new Calculator();

    $operation = $actions[ array_search($operator, $operators) ];
    $operationClass = 'calculator\operations\\'.$operation; 

    $result_equation = $string_equation .' = '. $calc->getResult( new $operationClass(floatval($val1),floatval($val2)) );

    echo $result_equation;
    
}

if($result_equation == ''){
   echo ' Not a valid equation!';
}
