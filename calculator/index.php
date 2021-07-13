<?php

declare(strict_types=1);
include 'includes/autoloader.inc.php';

// use calculator\operations\Divison;
// use calculator\operations\Addition;
// use calculator\operations\Multiplication;
// use calculator\operations\Subtraction;
use calculator\validations\ValidateSimpleEquation;

$result_equation = $string_equation = $val1 = $val2 = $operator = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $val1 = isset($_POST['val1']) ? $_POST['val1'] : '';
    $val2 = isset($_POST['val2']) ? $_POST['val2'] : '';
    $operator = isset($_POST['operator']) ? $_POST['operator'] : '';
    $equation = isset($_POST['equation']) ? $_POST['equation'] : '';

    $decimalPrecision = 3;
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

    if($string_equation != '' ){

    	$calc = new Calculator();

    	$operation = $actions[ array_search($operator, $operators) ];
		$operationClass = 'calculator\operations\\'.$operation; 

		$result_equation = $string_equation .' = '. $calc->getResult( new $operationClass(floatval($val1),floatval($val2),$decimalPrecision) );

    }

    if($result_equation == ''){
	    $result_equation = '<strong style="color:red;text-transform:uppercase;">Not a valid equation!</strong>';
	}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator with S.O.L.I.D.</title>
</head>

<body>
    <div style="text-align:center;line-height:30px;">
        <h2>Calculate - automatic find operator</h2>
        <p style="line-height:10px;">Ex. 5+5 = 10</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="equation" value="<?php echo $string_equation; ?>">
            <input type="submit" value="Calculate">
        </form>
        <br><em>or</em>
        <h2>Simple calculator</h2>
        <p style="line-height:10px;">Ex. 5 (+ Add) 5 = 10</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="number" name="val1" value="<?php echo $val1; ?>" step=".01">
            <select name="operator" id="operators">
                <option value="+" <?php echo ($operator=='+')?'selected':''; ?>>+ Add</option>
                <option value="-" <?php echo ($operator=='-')?'selected':''; ?>>- Subtract</option>
                <option value="*" <?php echo ($operator=='*')?'selected':''; ?>>* Multiply</option>
                <option value="/" <?php echo ($operator=='/')?'selected':''; ?>>/ Divide</option>
            </select>
            <input type="number" name="val2" value="<?php echo $val2; ?>" step=".01">
            <input type="submit" value="Calculate">
        </form>
        <hr style="border:1px dashed #ccc;">
        <h2>Result :: </h2>
        <?php echo $result_equation; ?>
    </div>


</body>

</html>
