<?php

class Weight {

	private float $weight;
	private string $unit;

	public function __construct(float $weight, string $unit) {
		$this->weight = $weight;
		$this->unit = $unit;
	}

	public function __toString() : string {
		return $this->weight . ' ' . $this->unit;
	}
}

$myWeight = new Weight(82.5, 'kg');
?><pre><?php
    var_dump($myWeight);
    print_r($myWeight);
    echo($myWeight);
?></pre>