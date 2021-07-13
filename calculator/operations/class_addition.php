<?php

namespace calculator\operations;

class Addition implements Operation
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
		return round($this->left + $this->right, $this->decimal);
	}


}

