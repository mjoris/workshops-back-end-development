<?php

$randomizer = new Random\Randomizer();

echo $randomizer->getInt(1, 100);
echo '<br>';
echo $randomizer->getFloat(0.1, 0.3); // default interval boundary: ClosedOpen
echo '<br>';
echo $randomizer->getBytesFromString('abcdefghij', 16);
echo '<br>';
echo $randomizer->shuffleBytes('lorem ipsum');
echo '<br>';
print_r($randomizer->shuffleArray(['apple', 'banana', 'orange']));
echo '<br>';
$randomizer = new Random\Randomizer(new Random\Engine\Mt19937());
echo $randomizer->getInt(1, 100);