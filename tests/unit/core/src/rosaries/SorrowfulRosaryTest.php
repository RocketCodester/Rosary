<?php
declare(strict_types=1);

namespace MyRosary;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;

/**
 * Class SorrowfulRosaryTest
 * @package SorrowfulRosary
 */
class SorrowfulRosaryTest extends TestCase
{
    /**
     * @var SorrowfulRosary
     */
    private $sorrowfulRosary;
    /**
     * {@inheritdoc}
     * @return void
     */
    public function setup(): void
    {
        $logger = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()->getMock();
        $this->sorrowfulRosary = new SorrowfulRosary($logger);
    }

    /**
     * Tests the SorrowfulRosary constructor.
     * @see SorrowfulRosary::__construct()
     * @throws \Exception
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(SorrowfulRosary::class, $this->sorrowfulRosary);
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
        $this->assertEquals($expectedMysteries, $this->sorrowfulRosary->getMysteries());
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
        $this->sorrowfulRosary->setMysteries($expectedMysteries);
        $this->assertEquals($expectedMysteries, $this->sorrowfulRosary->getMysteries());
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
        $this->assertEquals($expectedFruits, $this->sorrowfulRosary->getFruits());
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
        $this->sorrowfulRosary->setFruits($expectedFruits);
        $this->assertEquals($expectedFruits, $this->sorrowfulRosary->getFruits());
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
        $this->sorrowfulRosary->setRosaryPrayer();
        $this->assertEquals($expectedRosaryPrayer, $this->sorrowfulRosary->getRosaryPrayer());
    }

    /**
     * Tests the __toString test method.
     * @see Rosary::__toString
     * @throws \Exception
     * @return void
     */
    public function testToString(): void
    {
        $this->assertEquals('SorrowfulRosary', $this->sorrowfulRosary->__toString());
    }

    /**
     * Provides data to the setMysteries and getMysteries test methods.
     * @return array
     * @see SorrowfulRosaryTest::testGetMysteries()
     */
    public function mysteriesProvider(): array
    {
        $mysteries = Yaml::parseFile(__DIR__ . '\SorrowfulRosary.yaml')['mysteries'];
        return [[$mysteries]];
    }

    /**
     * Provides data to the setFruits and getFruits test methods.
     * @return array
     * @see SorrowfulRosaryTest::testGetFruits()
     */
    public function fruitsProvider(): array
    {
        $fruits = Yaml::parseFile(__DIR__ . '\SorrowfulRosary.yaml')['fruits'];
        return [[$fruits]];
    }

    /**
     * Provides data to the getRosaryPrayer test method.
     * @return array
     * @see SorrowfulRosaryTest::testGetRosaryPrayer()
     */
    public function rosaryProvider(): array
    {
        $rosaryPrayer = Yaml::parseFile(__DIR__ . '\SorrowfulRosary.yaml')['rosaryPrayer'];
        return [[$rosaryPrayer]];
    }
}
