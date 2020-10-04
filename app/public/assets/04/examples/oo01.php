<?php

class Product {

	private float $price;
	protected int $stock;
	public string $name;

	public function __construct(float $price, ?int $stock, string $name = 'unknown') {
		$this->price = $price;
		$this->stock = $stock;
		$this->name = $name;
	}
	
	public function lowerPrice() : void {
		$this->price *= 0.9;
	}

	public function getPrice() : float {
		return $this->price;
	}

}

$can = new Product(0.60, 820, 'Can Coke 33ml' );
echo $can->name . '<br />' . PHP_EOL;
$can->lowerPrice();

echo $can->getPrice();