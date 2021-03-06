<?php

namespace calculator\validations;

class ValidateSimpleEquation implements Validation
{
	private $equation;
	private $operators;

	public function __construct($equation, $operators){
		$this->equation = $equation;
		$this->operators = $operators;
	}

	public function result(){
		return $this->getMatches();
	}

	private function getMatches(){
		preg_match('/(\d+(?:[,.]\d+)?|pi|π)(?:\s*)(['.implode("\\", $this->operators).'])(?:\s*)(\d+(?:[,.]\d+)?|pi|π)/', $this->equation, $matches);
		return $matches; 
	}
}

