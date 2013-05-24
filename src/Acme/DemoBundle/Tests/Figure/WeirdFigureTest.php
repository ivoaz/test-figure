<?php

namespace Acme\DemoBundle\Tests\Figure;

use Acme\DemoBundle\Figure\WeirdFigure;

class WeirdFigureTest extends \PHPUnit_Framework_TestCase
{

    /**
     * WeirdFigure data Provider
     * @return Array
     */
    public function weirdFigureDataProvider()
    {
        return array(
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>2,'y' => 2),'expectes' => false,'onError' => 'Out of range in I sector. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>1.4,'y' => 1.4),'expectes' => true,'onError' => 'In range in I sector. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>1,'y' => -1),'expectes' => true,'onError' => 'In range in II sector. At line. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>1,'y' => -1.01),'expectes' => false,'onError' => 'Out of range in II sector. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>-2,'y' => -2),'expectes' => false,'onError' => 'Out of range in III sector. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>-1.4,'y' => -1.4),'expectes' => true,'onError' => 'In range in III sector. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>-2,'y' => 2),'expectes' => true,'onError' => 'In range in IV sector. At zero center.'),
            array('figure' => array('x' => 0,'y' => 0,'r' => 2),'point' => array('x' =>-2.01,'y' => 2),'expectes' => false,'onError' => 'Out of range in IV sector. At zero center.'),

            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>7,'y' => 7),'expectes' => false,'onError' => 'Out of range in I sector. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>6.4,'y' => 6.4),'expectes' => true,'onError' => 'In range in I sector. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>6,'y' => 4),'expectes' => true,'onError' => 'In range in II sector. At line. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>6,'y' => 3.99),'expectes' => false,'onError' => 'Out of range in II sector. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>3,'y' => 3),'expectes' => false,'onError' => 'Out of range in III sector. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>4.4,'y' => 3.4),'expectes' => true,'onError' => 'In range in III sector. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>3,'y' => 7),'expectes' => true,'onError' => 'In range in IV sector. At positive center.'),
            array('figure' => array('x' => 5,'y' => 5,'r' => 2),'point' => array('x' =>2.99,'y' => 7),'expectes' => false,'onError' => 'Out of range in IV sector. At positive center.'),

            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-3,'y' => -3),'expectes' => false,'onError' => 'Out of range in I sector. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-3.6,'y' => -3.6),'expectes' => true,'onError' => 'In range in I sector. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-4,'y' => -6),'expectes' => true,'onError' => 'In range in II sector. At line. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-4,'y' => -6.01),'expectes' => false,'onError' => 'Out of range in II sector. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-7,'y' => -7),'expectes' => false,'onError' => 'Out of range in III sector. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-6.4,'y' => -6.4),'expectes' => true,'onError' => 'In range in III sector. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-7,'y' => -3),'expectes' => true,'onError' => 'In range in IV sector. At negative center.'),
            array('figure' => array('x' => -5,'y' => -5,'r' => 2),'point' => array('x' =>-7.01,'y' => -3),'expectes' => false,'onError' => 'Out of range in IV sector. At negative center.'),
        );
    }

    /**
     * Test isPointInside method
     * @dataProvider weirdFigureDataProvider
     */
    public function testIsPointInside( $figure, $point, $expects, $onError )
    {
        $figure = new WeirdFigure( $figure['x'], $figure['y'], $figure['r'] );
        $this->assertEquals( $expects, $figure->isPointInside( $point['x'], $point['y'] ), $onError );
    }
}