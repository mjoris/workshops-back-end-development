<?php

class Animal {

	private string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	final function getName() : string {
		return $this->name;
	}

}

class Dog extends Animal {
	
	public function __construct(string $name) {
		echo 'Yo dawg!' . '<br />' . PHP_EOL;
		parent::__construct($name);
	}

}


$dog = new Dog('Sparky');
echo $dog->getName() . '<br />' . PHP_EOL;