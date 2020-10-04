<?php

abstract class Animal {

	private string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	abstract public function doTrick() : string;

}

class Dog extends Animal {
	
	private array $tricks = ['jump', 'lay down', 'roll over', 'play dead'];
	
	public function doTrick() : string {
		return $this->tricks[rand(0, sizeof($this->tricks) - 1)];
	}

}


$dog = new Dog('Sparky');
echo $dog->doTrick();