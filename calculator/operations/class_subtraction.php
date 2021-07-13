<?php

namespace calculator\operations;

class Subtraction implements Operation
{
	private $left;
	private $right;

	public function __construct(float $left, float $right){
		$this->left = $left;
		$this->right = $right;
	}

	public function operate(){
		return $this->left - $this->right;
	}


}

