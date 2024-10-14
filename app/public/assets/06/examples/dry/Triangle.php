<?php


class Triangle
{

    public function __construct(
        private Coordinate $c1,
        private Coordinate $c2,
        private Coordinate $c3)
    {

    }

    public function getArea(): float
    {
        return abs(0.5 * (
                $this->c1->x * ($this->c2->y - $this->c3->y) +
                $this->c2->x * ($this->c3->y - $this->c1->y) +
                $this->c3->x * ($this->c1->y - $this->c2->y)));
    }


}