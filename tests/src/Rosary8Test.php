<?php
declare(strict_types=1);

namespace RosaryApp\Src;
require 'GloriousRosary.yaml';

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Rosary8Test
 * @package Rosary
 */
class Rosary8Test extends TestCase
{
    /**
     * @var Rosary8
     */
    private $rosary8;

    /**
     * {@inheritdoc}
     * @return void
     */
    public function setup(): void
    {
//        $b=Yaml::parseFile('GloriousRosary.yaml')['fruits'];
        $logger = $this->getMockBuilder(Logger::class)->disableOriginalConstructor()->getMock();
        $mysteryType = $this->getMockBuilder(MysteryType::class)->disableOriginalConstructor()->getMock();
        $mysteryType->method('getMysteryType')->willReturn('glorious');

        $this->rosary8 = new Rosary8($mysteryType, $logger);
    }

    /**
     * Tests the Rosary8 constructor.
     * @see Rosary8::__construct()
     * @throws \Exception
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(Rosary8::class, $this->rosary8);
    }

    /**
     * Tests the getMysteryNumbers method.
     * @see Rosary8::getMysteryNumbers()
     * @dataProvider mysteryNumbersProvider
     * @param array $expectedMysteryNumbers
     * @throws \Exception
     * @return void
     */
    public function testGetMysteryNumbers(array $expectedMysteryNumbers): void
    {
        $this->assertEquals($expectedMysteryNumbers, $this->rosary8->getMysteryNumbers());
    }

    /**
     * Tests the setMysteryNumbers method.
     * @see Rosary8::setMysteryNumbers()
     * @dataProvider mysteryNumbersProvider
     * @param array $expectedMysteryNumbers
     * @throws \Exception
     * @return void
     */
    public function testSetMysteryNumbers(array $expectedMysteryNumbers): void
    {
        $this->rosary8->setMysteryNumbers();
        $this->assertEquals($expectedMysteryNumbers, $this->rosary8->getMysteryNumbers());
    }

    /**
     * Tests the getMysteries method.
     * @see Rosary8::getMysteries()
     * @dataProvider mysteriesProvider
     * @param array $expectedMysteries
     * @throws \Exception
     * @return void
     */
    public function testGetMysteries(array $expectedMysteries): void
    {
        $this->assertEquals($expectedMysteries, $this->rosary8->getMysteries());
    }

    /**
     * Tests the setMysteries method.
     * @see Rosary8::setMysteries()
     * @dataProvider mysteriesProvider
     * @param array $expectedMysteries
     * @throws \Exception
     * @return void
     */
    public function testSetMysteries(array $expectedMysteries): void
    {
        $this->rosary8->setMysteries();
        $this->assertEquals($expectedMysteries, $this->rosary8->getMysteries());
    }

    /**
     * Tests the getMysteries method.
     * @see Rosary8::getFruits()
     * @dataProvider fruitsProvider
     * @param array $expectedFruits
     * @throws \Exception
     * @return void
     */
    public function testGetFruits(array $expectedFruits): void
    {
        $this->assertEquals($expectedFruits, $this->rosary8->getFruits());
    }

    /**
     * Tests the setFruits test method.
     * @see Rosary8::setFruits()
     * @dataProvider fruitsProvider
     * @param array $expectedFruits
     * @throws \Exception
     * @return void
     */
    public function testSetFruits(array $expectedFruits): void
    {
        $this->rosary8->setFruits();
        $this->assertEquals($expectedFruits, $this->rosary8->getFruits());
    }

    /**
     * Tests the __toString test method.
     * @see Rosary8::__toString
     * @throws \Exception
     * @return void
     */
    public function testToString(): void
    {
        $this->assertEquals('Rosary8', $this->rosary8->__toString());
    }

    /**
     * Tests the getRosaryData test method.
     * @see Rosary8::getRosaryData()
     * @dataProvider rosaryDataProvider
     * @param array $expectedRosaryData
     * @throws \Exception
     * @return void
     */
    public function testGetRosaryData(array $expectedRosaryData): void
    {
        $this->rosary8->setRosaryData();
        $this->assertEquals($expectedRosaryData, $this->rosary8->getRosaryData());
    }

    /**
     * Tests the setRosaryData test method.
     * @see Rosary8::setRosaryData()
     * @dataProvider rosaryDataProvider
     * @param array $expectedRosaryData
     * @throws \Exception
     * @return void
     */
    public function testSetRosaryData(array $expectedRosaryData): void
    {
        $this->assertEquals($expectedRosaryData, $this->rosary8->getRosaryData());
    }

    /**
     * Tests the getRosary test method.
     * @see Rosary8::getRosary()
     * @dataProvider rosaryProvider
     * @param string $expectedRosaryPrayer
     * @throws \Exception
     * @return void
     */
    public function testGetRosary(string $expectedRosaryPrayer): void
    {
        $this->rosary8->setRosaryData();
        $this->assertEquals($expectedRosaryPrayer, $this->rosary8->getRosary());
    }

    /**
     * Provides data to the testSetMysteryNumbers and testGetMysteryNumbers test methods.
     * @return array
     * @see GloriousRosaryTest::testGetMysteryNumbers()
     */
    public function mysteryNumbersProvider(): array
    {
        $mysteryNumbers = ['first', 'second', 'third', 'fourth', 'fifth'];
        return [[$mysteryNumbers]];
    }

    /**
     * Provides data to the setMysteries and getMysteries test methods.
     * @return array
     * @see GloriousRosaryTest::testGetMysteries()
     */
    public function mysteriesProvider(): array
    {
        $mysteries = Yaml::parseFile('C:\xampp\htdocs\Rosary\tests\src\GloriousRosary.yaml')['mysteries'];
        return [[$mysteries]];
    }

    /**
     * Provides data to the setFruits and getFruits test methods.
     * @return array
     * @see GloriousRosaryTest::testGetFruits()
     */
    public function fruitsProvider(): array
    {
        $fruits = Yaml::parseFile('C:\xampp\htdocs\Rosary\tests\src\GloriousRosary.yaml')['fruits'];
        return [[$fruits]];
    }

    /**
     * Provides data to the getRosary test methods.
     * @return array
     * @see GloriousRosaryTest::testGetRosaryPrayer()
     */
    public function rosaryProvider(): array
    {
        $rosaryPrayer = Yaml::parseFile('C:\xampp\htdocs\Rosary\tests\src\GloriousRosary.yaml')['rosaryPrayer'];
        return [[$rosaryPrayer]];
    }

    /**
     * Provides data to the setRosaryData and getRosaryData test methods.
     * @return array
     * @see GloriousRosaryTest::testGetRosaryData()
     */
    public function rosaryDataProvider(): array
    {
        $rosaryData = [
            'glorious' =>
                [
                    'first' =>
                        [
                            0 => 'Resurrection',
                            1 => 'faith',
                        ],
                    'second' =>
                        [
                            0 => 'Ascension',
                            1 => 'hope',
                        ],
                    'third' =>
                        [
                            0 => 'Descent of the Holy Ghost upon the apostles and disciples',
                            1 => 'love of God',
                        ],
                    'fourth' =>
                        [
                            0 => 'Assumption',
                            1 => 'grace of a happy death',
                        ],
                    'fifth' =>
                        [
                            0 => 'Coronation of Mary as Queen of heaven and earth',
                            1 => 'trust in Mary\'s intercession',
                        ],
                ],
            'joyful' =>
                [
                    'first' =>
                        [
                            0 => 'Annunciation',
                            1 => 'humility',
                        ],
                    'second' =>
                        [
                            0 => 'Visitation',
                            1 => 'love of neighbor',
                        ],
                    'third' =>
                        [
                            0 => 'Nativity',
                            1 => 'poverty',
                        ],
                    'fourth' =>
                        [
                            0 => 'Presentation',
                            1 => 'obedience',
                        ],
                    'fifth' =>
                        [
                            0 => 'Finding of the child, Jesus, in the Temple',
                            1 => 'joy in finding Jesus',
                        ],
                ],
            'sorrowful' =>
                [
                    'first' =>
                        [
                            0 => 'Agony in the Garden',
                            1 => 'contrition (or sorrow) for sin',
                        ],
                    'second' =>
                        [
                            0 => 'Scourging at the Pillar',
                            1 => 'purity',
                        ],
                    'third' =>
                        [
                            0 => 'Crowning with Thorns',
                            1 => 'courage',
                        ],
                    'fourth' =>
                        [
                            0 => 'Carrying of the Cross',
                            1 => 'patience',
                        ],
                    'fifth' =>
                        [
                            0 => 'Crucifixion',
                            1 => 'perseverance',
                        ],
                ],
        ];
        return [[$rosaryData]];
    }
}
