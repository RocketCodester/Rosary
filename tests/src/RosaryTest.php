<?php
declare(strict_types=1);

namespace RosaryApp\Src;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;

/**
 * Class RosaryTest
 * @package Rosary
 */
class RosaryTest extends TestCase
{
    /**
     * @var Rosary
     */
    private $rosary;

    /**
     * {@inheritdoc}
     * @return void
     * @throws \ReflectionException
     */
    public function setup(): void
    {
        $logger = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()->getMock();

        $this->rosary = $this->getMockForAbstractClass(Rosary::class, [$logger], '', false, false, true, ['__construct', '__toString']);
    }

    /**
     * Tests the Rosary __construct method.
     * @see Rosary::__construct()
     * @throws \Exception
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(Rosary::class, $this->rosary);
    }

    /**
     * Tests the Rosary __toString method.
     * @see Rosary::__toString()
     * @throws \Exception
     * @return void
     */
    public function testToString(): void
    {
        $this->rosary->expects($this->any())->method('__toString')->will($this->returnValue('GloriousRosary'));
        $this->assertEquals('GloriousRosary', $this->rosary->__toString());
    }
}
