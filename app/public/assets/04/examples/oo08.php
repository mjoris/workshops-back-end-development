<?php

class Weight {

	private float $weight;
	private string $unit;

	public function __construct(float $weight, string $unit) {
		$this->weight = $weight;
		$this->unit = $unit;
	}
}

$myWeight = new Weight(82.5, 'kg');
?>
<pre><?php
$samePointer = $myWeight;
$myWeight2 = new Weight(82.5, 'kg');
$otherWeight = new Weight(11, 'stones');

echo('<br>' . '$myWeight == $myWeight2' . '<br/>');
var_dump($myWeight == $myWeight2);
echo('<br>' . '$myWeight == $otherWeight' . '<br/>');
var_dump($myWeight == $otherWeight);
echo('<br>' . '$myWeight === $samePointer' . '<br/>');
var_dump($myWeight === $samePointer);
echo('<br>' . '$myWeight === $myWeight2' . '<br/>');
var_dump($myWeight === $myWeight2);
echo('<br>' . '$myWeight === $otherWeight' . '<br/>');
var_dump($myWeight === $otherWeight);
?></pre>