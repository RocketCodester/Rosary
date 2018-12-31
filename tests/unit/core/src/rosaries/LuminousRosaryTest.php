<?php
declare(strict_types=1);

namespace MyRosary;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;

/**
 * Class LuminousRosaryTest
 * @package LuminousRosary
 */
class LuminousRosaryTest extends TestCase
{
    /**
     * @var LuminousRosary
     */
    private $luminousRosary;
    /**
     * {@inheritdoc}
     * @return void
     */
    public function setup(): void
    {
        $logger = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()->getMock();
        $this->luminousRosary = new LuminousRosary($logger);
    }

    /**
     * Tests the LuminousRosary constructor.
     * @see LuminousRosary::__construct()
     * @throws \Exception
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(LuminousRosary::class, $this->luminousRosary);
    }

    /**
     * Tests the getMysteries method.
     * @see Rosary::getMysteries()
     * @dataProvider mysteriesProvider
     * @param array $expectedMysteries
     * @throws \Exception
     * @return void
     */
    public function testGetMysteries(array $expectedMysteries): void
    {
        $this->assertEquals($expectedMysteries, $this->luminousRosary->getMysteries());
    }

    /**
     * Tests the setMysteries method.
     * @see Rosary::setMysteries()
     * @dataProvider mysteriesProvider
     * @param array $expectedMysteries
     * @throws \Exception
     * @return void
     */
    public function testSetMysteries(array $expectedMysteries): void
    {
        $this->luminousRosary->setMysteries($expectedMysteries);
        $this->assertEquals($expectedMysteries, $this->luminousRosary->getMysteries());
    }

    /**
     * Tests the getMysteries method.
     * @see Rosary::getFruits()
     * @dataProvider fruitsProvider
     * @param array $expectedFruits
     * @throws \Exception
     * @return void
     */
    public function testGetFruits(array $expectedFruits): void
    {
        $this->assertEquals($expectedFruits, $this->luminousRosary->getFruits());
    }

    /**
     * Tests the setFruits test method.
     * @see Rosary::setFruits()
     * @dataProvider fruitsProvider
     * @param array $expectedFruits
     * @throws \Exception
     * @return void
     */
    public function testSetFruits(array $expectedFruits): void
    {
        $this->luminousRosary->setFruits($expectedFruits);
        $this->assertEquals($expectedFruits, $this->luminousRosary->getFruits());
    }

    /**
     * Tests the getRosaryPrayer test method.
     * @see Rosary::getRosaryPrayer()
     * @dataProvider rosaryProvider
     * @param string $expectedRosaryPrayer
     * @throws \Exception
     * @return void
     */
    public function testGetRosaryPrayer(string $expectedRosaryPrayer): void
    {
        $this->luminousRosary->setRosaryPrayer();
        $this->assertEquals($expectedRosaryPrayer, $this->luminousRosary->getRosaryPrayer());
    }

    /**
     * Tests the __toString test method.
     * @see Rosary::__toString
     * @throws \Exception
     * @return void
     */
    public function testToString(): void
    {
        $this->assertEquals('LuminousRosary', $this->luminousRosary->__toString());
    }

    /**
     * Provides data to the setMysteries and getMysteries test methods.
     * @return array
     * @see LuminousRosaryTest::testGetMysteries()
     */
    public function mysteriesProvider(): array
    {
        $mysteries = Yaml::parseFile(__DIR__ . '\LuminousRosary.yaml')['mysteries'];
        return [[$mysteries]];
    }

    /**
     * Provides data to the setFruits and getFruits test methods.
     * @return array
     * @see LuminousRosaryTest::testGetFruits()
     */
    public function fruitsProvider(): array
    {
        $fruits = Yaml::parseFile(__DIR__ . '\LuminousRosary.yaml')['fruits'];
        return [[$fruits]];
    }

    /**
     * Provides data to the getRosaryPrayer test method.
     * @return array
     * @see LuminousRosaryTest::testGetRosaryPrayer()
     */
    public function rosaryProvider(): array
    {
        $rosaryPrayer = Yaml::parseFile(__DIR__ . '\LuminousRosary.yaml')['rosaryPrayer'];
        return [[$rosaryPrayer]];
    }
}
