<?php
declare(strict_types=1);

namespace Rosary;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;
require_once "C:\\xampp\htdocs\Rosary\GloriousRosary.php";

/**
 * Class GloriousRosaryTest
 * @package GloriousRosary
 */
class GloriousRosaryTest extends TestCase
{
    /**
     * @var GloriousRosary
     */
    private $gloriousRosary;
    /**
     * @var Logger
     */
    private $logger;
    /**
     * {@inheritdoc}
     * @return void
     */
    public function setup(): void
    {
        $this->logger = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()->getMock();

        $this->gloriousRosary = new GloriousRosary($this->logger);
    }

    /**
     * Tests the GloriousRosary constructor.
     * @see GloriousRosary::__construct()
     * @throws \Exception
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(GloriousRosary::class, $this->gloriousRosary);
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
        $this->assertEquals($expectedMysteries, $this->gloriousRosary->getMysteries());
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
        $this->gloriousRosary->setMysteries($expectedMysteries);
        $this->assertEquals($expectedMysteries, $this->gloriousRosary->getMysteries());
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
        $this->assertEquals($expectedFruits, $this->gloriousRosary->getFruits());
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
        $this->gloriousRosary->setFruits($expectedFruits);
        $this->assertEquals($expectedFruits, $this->gloriousRosary->getFruits());
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
        $this->gloriousRosary->setRosaryPrayer();
        $this->assertEquals($expectedRosaryPrayer, $this->gloriousRosary->getRosaryPrayer());
    }

    /**
     * Tests the __toString test method.
     * @see Rosary::__toString
     * @throws \Exception
     * @return void
     */
    public function testToString(): void
    {
        $this->assertEquals('GloriousRosary', $this->gloriousRosary->__toString());
    }

    /**
     * Provides data to the setMysteries and getMysteries test methods.
     * @return array
     * @see GloriousRosaryTest::testGetMysteries()
     */
    public function mysteriesProvider(): array
    {
        $mysteries = Yaml::parseFile('GloriousRosary.yaml')['mysteries'];
        return [[$mysteries]];
    }

    /**
     * Provides data to the setFruits and getFruits test methods.
     * @return array
     * @see GloriousRosaryTest::testGetFruits()
     */
    public function fruitsProvider(): array
    {
        $fruits = Yaml::parseFile('GloriousRosary.yaml')['fruits'];
        return [[$fruits]];
    }

    /**
     * Provides data to the getRosaryPrayer test method.
     * @return array
     * @see GloriousRosaryTest::testGetRosaryPrayer()
     */
    public function rosaryProvider(): array
    {
        $rosaryPrayer = Yaml::parseFile('GloriousRosary.yaml')['rosaryPrayer'];
        return [[$rosaryPrayer]];
    }
}
