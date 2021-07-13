<?php

include 'validations\interface_validations.php';

use calculator\validations\Validation;

class Validator
{
	public function getResult(Validation $validate){
		return $validate->result();
	}
}

