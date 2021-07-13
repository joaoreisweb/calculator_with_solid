<?php

include 'operations\interface_operation.php';

use calculator\operations\Operation;

class Calculator
{
	public function getResult(Operation $operation){
		return $operation->operate();
	}
}

