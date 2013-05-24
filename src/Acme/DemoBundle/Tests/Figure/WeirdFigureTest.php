<?php

namespace Acme\DemoBundle\Tests\Figure;
use Acme\DemoBundle\Figure\WeirdFigure;

class WeirdFigureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * OK test
     */
    public function testNull()
    {
        $wf = new WeirdFigure(0,0,10);
        
        $result = $wf->isPointInside(0, 0);
        $this->assertEquals(true, $result);
    }
    
    /**
     * OK test
     */
    public function testOutgoingCoordinates()
    {
        $wf = new WeirdFigure(0,0,10);
        
        $result = $wf->isPointInside(20, 20);
        $this->assertEquals(false, $result);
    }
    
    /**
     * OK test
     */
    public function testOutgoingNegativeDecimals()
    {
        $wf = new WeirdFigure(-50, -50, 0.4);
        
        $result = $wf->isPointInside(-50.5, -50.5);
        $this->assertEquals(false, $result);
    }
    
    /**
     * OK test
     */
    public function testDeciamls()
    {
        $wf = new WeirdFigure(0,0,0.1);
        
        $result = $wf->isPointInside(0.1, 0.1);
        $this->assertEquals(false, $result);
    }
    
    /**
     * OK test
     */
    public function testDsadsadasdas()
    {
        $wf = new WeirdFigure(0,0,1);
        
        $result = $wf->isPointInside(-1, 1);
        $this->assertEquals(true, $result);
    }
}
