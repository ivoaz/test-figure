<?php

namespace Acme\DemoBundle\Figure;

class WeirdFigure
{
    private $x;
    private $y;
    private $radius;

    /**
     * @param integer|float $x x coordinate
     * @param integer|float $y y coordinate
     * @param integer|float $r greater than thero radius
     */
    public function __construct($x, $y, $r)
    {
        $this->setCoordinates($x, $y);
        $this->setRadius($r);
    }

    /**
     * Sets new coordinates
     *
     * @param integer|float $x
     * @param integer|float $y
     */
    public function setCoordinates($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Sets new radius
     *
     * @param integer|float $r greater than thero radius
     */
    public function setRadius($r)
    {
        if ($r <= 0) {
            throw new \Exception('Radius must be greater than zero');
        }

        $this->radius = $r;
    }

    /**
     * Determines whether the point is inside the weird figure (on the border
     * counts as inside)
     *
     * @param integer|float $x
     * @param integer|float $y
     * @return boolean
     */
    public function isPointInside($x, $y)
    {
        $x -= $this->x;
        $y -= $this->y;

        // circle
        if ($x > 0 && $y > 0 || $x < 0 && $y < 0) {
            return $x*$x + $y*$y <= $this->radius * $this->radius;
        }

        // square
        if ($x < 0 && $y > 0) {
            return abs( $x ) <= $this->radius && $y <= $this->radius;
        }

        // center
        if ( $x == 0 && $y == 0 ) {
            return $x <= $this->radius;
        }

        // triangle
        return $x + abs($y) <= $this->radius;
    }
}
