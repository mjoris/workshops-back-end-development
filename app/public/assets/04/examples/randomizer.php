<?php

$randomizer = new Random\Randomizer();

echo $randomizer->getInt(1, 100); // 42
echo '<br>';
echo $randomizer->shuffleBytes('lorem ipsum'); // "ols mpeurim"
echo '<br>';
print_r($randomizer->shuffleArray(['apple', 'banana', 'orange'])); // ['orange', 'apple', 'banana']
echo '<br>';
$randomizer = new Random\Randomizer(new Random\Engine\Mt19937());
echo $randomizer->getInt(1, 100); // 68