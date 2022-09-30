<?php

class Product {

    public function __construct(
        private float $price,
        protected ?int $stock,
        public string $name = 'unknown'
    ) {}

	public function lowerPrice() : void {
		$this->price *= 0.9;
	}

	public function getPrice() : float {
		return $this->price;
	}
}

$can = new Product(0.60, 820, 'Can Coke 33ml');
echo $can->name . '<br />' . PHP_EOL;
$can->lowerPrice();

echo $can->getPrice();