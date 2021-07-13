<?php

namespace calculator\operations;

class Divison implements Operation
{
	private $left;
	private $right;
	private $decimal;

	public function __construct(float $left, float $right, float $decimal=2){
		$this->left = $left;
		$this->right = $right;
		$this->decimal = $decimal;
	}

	public function operate(){
		if($this->right == 0){
			return 'Infinite';
		}else{
			return round($this->left / $this->right, $this->decimal);
		}
		
	}


}

