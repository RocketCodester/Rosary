<?php

declare(strict_types=1);

namespace Rosary;
use Symfony\Component\Yaml\Yaml;

require "vendor/autoload.php";
require_once("MysteryType.php");

class Rosary8
{
    /**
     * @var MysteryType
     */
    private $mysteryType;
    /**
     * @var array
     */
    private $rosary;
    /**
     * @var array
     */
    private $mysteryNumbers;
    /**
     * @var array
     */
    private $mysteries;
    /**
     * @var array
     */
    private $fruits;

    /**
     * Yam constructor.
     * @param MysteryType $mysteryType
     */
    function __construct(MysteryType $mysteryType)
    {
        $this->mysteryType = $mysteryType;
        $this->setRosaryData();
        $this->setMysteryNumbers();
        $this->setMysteries();
        $this->setFruits();
        print "In Yam constructor\n";
    }

    /**
     * Prints the rosary prayer for the current date.
     * @return void
     */
    function printRosary(): void
    {
        for ($decadeNumber = 0; $decadeNumber<5; $decadeNumber++)
        {
            print 'The ' . $this->getMysteryNumbers()[$decadeNumber] . ' ' . $this->mysteryType->getMysteryType() . ' mystery is the ' .
                $this->getMysteries()[$decadeNumber] . '. Fruit of the mystery is ' . $this->getFruits()[$decadeNumber] . ".\n";
            print "Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.\n";
            for ($hailMaryNumber = 0; $hailMaryNumber < 10; $hailMaryNumber++)
            {
                print "Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.\n";
            }
            print "Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.\n\n";
        }
    }

    /**
     * @param string $mysteryType
     * @return void
     */
    function setMysteryType(string $mysteryType): void
    {
        $this->mysteryType = $mysteryType;
    }

    /**
     * Sets the rosary array.
     * @return void
     */
    function setRosaryData(): void
    {
        $this->rosary = Yaml::parseFile('rosary.yaml');
    }

    /**
     * Gets the rosary array.
     * @return array
     */
    function getRosaryData(): array
    {
        return $this->rosary;
    }

    /**
     * Sets the mystery numbers.
     * @return void
     */
    function setMysteryNumbers(): void
    {
        $this->mysteryNumbers = array_keys($this->rosary[$this->mysteryType->getMysteryType()]);
    }

    /**
     * Gets the mystery numbers.
     * @return array
     */
    function getMysteryNumbers(): array
    {
        return $this->mysteryNumbers;
    }

    /**
     * Sets the mysteries.
     * @return void
     */
    function setMysteries(): void
    {
        $mysteryNumbers = $this->rosary[$this->mysteryType->getMysteryType()];
        foreach ($mysteryNumbers as $mysteryNumber)
        {
            $this->mysteries[] = $mysteryNumber[0];
        }
    }

    /**
     * Gets the mysteries.
     * @return array
     */
    function getMysteries(): array
    {
        return $this->mysteries;
    }

    /**
     * Sets the fruits of the mysteries.
     * @return  void
     */
    function setFruits(): void
    {
        $mysteryNumbers = $this->rosary[$this->mysteryType->getMysteryType()];
        foreach ($mysteryNumbers as $mysteryNumber)
        {
            $this->fruits[] = $mysteryNumber[1];
        }
    }

    /**
     * Gets the fruits of the mysteries.
     * @return array
     */
    function getFruits(): array
    {
        return $this->fruits;
    }

}

$date = new Date();
$mysteryType = new MysteryType($date);
$rosary = new Rosary8($mysteryType);
$rosary->printRosary();
