<?php
declare(strict_types=1);

namespace MyRosary;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;

/**
 * Class JoyfulRosaryTest
 * @package JoyfulRosary
 */
class JoyfulRosaryTest extends TestCase
{
    /**
     * @var JoyfulRosary
     */
    private $joyfulRosary;
    /**
     * {@inheritdoc}
     * @return void
     */
    public function setup(): void
    {
        $logger = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()->getMock();
        $this->joyfulRosary = new JoyfulRosary($logger);
    }

    /**
     * Tests the JoyfulRosary constructor.
     * @see JoyfulRosary::__construct()
     * @throws \Exception
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(JoyfulRosary::class, $this->joyfulRosary);
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
        $this->assertEquals($expectedMysteries, $this->joyfulRosary->getMysteries());
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
        $this->joyfulRosary->setMysteries($expectedMysteries);
        $this->assertEquals($expectedMysteries, $this->joyfulRosary->getMysteries());
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
        $this->assertEquals($expectedFruits, $this->joyfulRosary->getFruits());
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
        $this->joyfulRosary->setFruits($expectedFruits);
        $this->assertEquals($expectedFruits, $this->joyfulRosary->getFruits());
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
        $this->joyfulRosary->setRosaryPrayer();
        $this->assertEquals($expectedRosaryPrayer, $this->joyfulRosary->getRosaryPrayer());
    }

    /**
     * Tests the __toString test method.
     * @see Rosary::__toString
     * @throws \Exception
     * @return void
     */
    public function testToString(): void
    {
        $this->assertEquals('JoyfulRosary', $this->joyfulRosary->__toString());
    }

    /**
     * Provides data to the setMysteries and getMysteries test methods.
     * @return array
     * @see JoyfulRosaryTest::testGetMysteries()
     */
    public function mysteriesProvider(): array
    {
        $mysteries = Yaml::parseFile(__DIR__ . '\JoyfulRosary.yaml')['mysteries'];
        return [[$mysteries]];
    }

    /**
     * Provides data to the setFruits and getFruits test methods.
     * @return array
     * @see JoyfulRosaryTest::testGetFruits()
     */
    public function fruitsProvider(): array
    {
        $fruits = Yaml::parseFile(__DIR__ . '\JoyfulRosary.yaml')['fruits'];
        return [[$fruits]];
    }

    /**
     * Provides data to the getRosaryPrayer test method.
     * @return array
     * @see JoyfulRosaryTest::testGetRosaryPrayer()
     */
    public function rosaryProvider(): array
    {
        $rosaryPrayer = Yaml::parseFile(__DIR__ . '\JoyfulRosary.yaml')['rosaryPrayer'];
        return [[$rosaryPrayer]];
    }
}
