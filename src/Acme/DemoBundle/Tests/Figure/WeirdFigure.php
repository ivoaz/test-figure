<?php

namespace Acme\DemoBundle\Tests\Figure;

use Acme\DemoBundle\Figure\WeirdFigure;

class WeirdFigureTest extends \PHPUnit_Framework_TestCase
{
    public function testPrime() {

	$xpos=0;
	$ypos=0;
	$radius=10;
        $figure = new WeirdFigure($xpos,$ypos,$radius);

        for ($y=-$radius*2;$y<=$radius*2;$y++) {
            for ($x=-$radius*2;$x<=$radius*2;$x++) {
                $isPointInsideCheck=$figure->isPointInside($xpos+$x,$ypos+$y);

                if ($x > 0 && $y > 0 || $x < 0 && $y < 0) {
                    $isPointInside = $x*$x + $y*$y <= $radius * $radius;
                }
                else if ($x <= 0 && $y >= 0) {
                    $isPointInside = abs($x) < $radius && $y < $radius;
                }
                else {
                    $isPointInside = $x + abs($y) <= $radius;
                }

                $this->assertEquals($isPointInside,$isPointInsideCheck);
            }

        }


    }

/*    public function testAdd()
    {
	$manager = new PrimeManager();

	$numbers = range(2,1000);

	$result = $manager->selectOnlyPrimes( $numbers );

	foreach ($result as $v) {
		$isPrime = \gmp_prob_prime ( $v );
		if ($isPrime==1) {// gmp not sure, must do the hard way
			$isPrime=2;
			for ($d=2;$d<$v;$d++) {
				if ($v%$d==0) {
					$isPrime=0;
					break;
				}
			}
		}
		$this->assertEquals($isPrime,2);
	}

    }*/
}

?>
