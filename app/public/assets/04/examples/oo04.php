<?php

class Animal
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    protected function say(string $what): string
    {
        return $what;
    }

}

class Dog extends Animal
{

    public function bark(): void
    {
        echo $this->say('WOOF!');
    }

}

$dog = new Dog('Sparky');
$dog->bark();