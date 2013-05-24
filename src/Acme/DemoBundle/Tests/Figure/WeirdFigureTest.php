<?php
namespace Acme\DemoBundle\Tests\WeirdFigureTest;
use Acme\DemoBundle\Figure\WeirdFigure;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WeirdFigureTest extends WebTestCase
{
    public function testIndex()
    {
       $weirdFigure = new WeirdFigure(0,0,5);
	   $result = $weirdFigure->isPointInside(0,0);
	   $this->assertEquals(true, $result);
	   
    }
	public function testIndex2()
    {
       $weirdFigure = new WeirdFigure(10,10,11);
	   $result = $weirdFigure->isPointInside(1,2);
	   $this->assertEquals(true, $result);
	   
    }
	public function testIndex3()
    {
       $weirdFigure = new WeirdFigure(0,0,5);
	   $result = $weirdFigure->isPointInside(1.2,2.2);
	   $this->assertEquals(true, $result);
	   
    }
	public function testIndex4()
    {
       $weirdFigure = new WeirdFigure(10,10,20);
	   $result = $weirdFigure->isPointInside(1.2,2.2);
	   $this->assertEquals(true, $result);
	   
    }
	public function testIndex5()
    {
       $weirdFigure = new WeirdFigure(10,10,20);
	   $result = $weirdFigure->isPointInside(-2,-6);
	   $this->assertEquals(true, $result);
	   
    }
	public function testIndex6()
    {
       $weirdFigure = new WeirdFigure(10,10,20);
	   $result = $weirdFigure->isPointInside('a','b');
	   $this->assertEquals(true, $result);
	   
    }
	public function testIndex7()
    {
       $weirdFigure = new WeirdFigure(10,10,20);
	   $result = $weirdFigure->isPointInside(20,20);
	   $this->assertEquals(true, $result);
	   
    }
}