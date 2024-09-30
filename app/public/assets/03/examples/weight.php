<?php

class Weight
{

    private float $weight;
    private string $unit;

    public function __construct(float $weight, string $unit)
    {
        $this->weight = $weight;
        $this->unit = $unit;
    }

    #[Override] // I know this method is overriding a parent method. If that would ever change, please let me know
    public function __toString(): string
    {
        return $this->weight . ' ' . $this->unit;
    }
}

$myWeight = new Weight(82.5, 'kg');
?>
<pre><?php
    echo($myWeight);
    ?></pre>