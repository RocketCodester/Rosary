<?php
declare(strict_types=1);

namespace Rosary;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Rosary8Test
 * @package Rosary
 */
final class Rosary8Test extends TestCase
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
     * Provides data to the testSetMysteryNumbers and testGetMysteryNumbers test methods.
     * @return array
     * @see Rosary8Test::testGetMysteryNumbers()
     */
    public function mysteryNumbersProvider(): array
    {
        $mysteryNumbers = ['first', 'second', 'third', 'fourth', 'fifth'];
        $yaml = Yaml::dump($mysteryNumbers);
        file_put_contents('MysteryNumbers.yaml', $yaml);
        return [[$mysteryNumbers]];
    }

    /**
     * Provides data to the setMysteries and getMysteries test methods.
     * @return array
     * @see Rosary8Test::testGetMysteries()
     */
    public function mysteriesProvider(): array
    {
        $mysteries = [
            "Resurrection",
            "Ascension",
            "Descent of the Holy Ghost upon the apostles and disciples",
            "Assumption",
            "Coronation of Mary as Queen of heaven and earth",
        ];
        $yaml = Yaml::dump($mysteries);
        file_put_contents('Mysteries.yaml', $yaml);
        return [[$mysteries]];
    }

    /**
     * Provides data to the setFruits and getFruits test methods.
     * @return array
     * @see Rosary8Test::testGetFruits()
     */
    public function fruitsProvider(): array
    {
        $fruits = [
            'faith',
            'hope',
            'love of God',
            'grace of a happy death',
            "trust in Mary's intercession",
        ];
        $yaml = Yaml::dump($fruits);
        file_put_contents('Fruits.yaml', $yaml);
        return [[$fruits]];
    }

    /**
     * Provides data to the setRosaryData and getRosaryData test methods.
     * @return array
     * @see Rosary8Test::testGetRosaryData()
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
        $yaml = Yaml::dump($rosaryData);
        file_put_contents('RosaryData.yaml', $yaml);
        return [[$rosaryData]];
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
     * Provides data to the getRosary test methods.
     * Change line separators to LF - Unix and OS X (\n) and then run this test.
     * @return array
     * @see Rosary8Test::testGetRosary()
     */
    public function rosaryProvider(): array
    {
        $rosaryPrayer = "The first glorious mystery is the Resurrection. Fruit of the mystery is faith.
Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.

The second glorious mystery is the Ascension. Fruit of the mystery is hope.
Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.

The third glorious mystery is the Descent of the Holy Ghost upon the apostles and disciples. Fruit of the mystery is love of God.
Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.

The fourth glorious mystery is the Assumption. Fruit of the mystery is grace of a happy death.
Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.

The fifth glorious mystery is the Coronation of Mary as Queen of heaven and earth. Fruit of the mystery is trust in Mary's intercession.
Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.
Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.

";
        $yaml = Yaml::dump($rosaryPrayer);
        file_put_contents('RosaryPrayer.yaml', $yaml);
        return [[$rosaryPrayer]];
    }
}
