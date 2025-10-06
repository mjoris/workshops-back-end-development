<?php

class Product
{
    protected int $stock;
    public private(set) string $name; // asymmetric visibility

    public function __construct(float $price, ?int $stock, string $name = 'unknown')
    {
        $this->price = $price;
        $this->stock = $stock;
        $this->name = $name;
    }

    public float $price = 0.00 { // property hook
        get => $this->price;
        set(float $price) {
            $this->price = $price;
        }
    }

}

$can = new Product(0.60, 820, 'Can Coke 33ml');
echo $can->name . '<br />' . PHP_EOL;
echo $can->price;