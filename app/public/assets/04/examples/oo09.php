<?php

class Weight
{

    private float $weight;
    private ?DateTime $registrationDate;

    public function __construct(float $weight, ?DateTime $registrationDate = null)
    {
        $this->weight = $weight;
        $this->registrationDate = $registrationDate;
    }

    public function getRegistrationDate(): ?DateTime
    {
        return $this->registrationDate;
    }
}


?>
<pre><?php

    $myWeight1 = new Weight(82.5);
    var_dump($myWeight1?->getRegistrationDate()?->format('Y-m-d'));
    $myWeight2 = new Weight(78.5, new DateTime('now'));
    var_dump($myWeight2?->getRegistrationDate()?->format('Y-m-d'));

    ?></pre>