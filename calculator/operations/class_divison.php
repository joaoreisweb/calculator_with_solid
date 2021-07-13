<?php

namespace calculator\operations;

class Divison implements Operation
{
	private $left;
	private $right;

	public function __construct(float $left, float $right){
		$this->left = $left;
		$this->right = $right;
	}

	public function operate(){
		if($this->right == 0){
			return 'Infinite';
		}else{
			return $this->left / $this->right;
		}
		
	}


}

