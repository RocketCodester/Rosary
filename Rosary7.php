<?php

declare(strict_types=1);

namespace Rosary;

require_once("MysteryType.php");

/**
 * Class Rosary7
 * @package Rosary
 */
class Rosary7
{
    /**
     * @var MysteryType
     */
    public $mysteryType;
    /**
     * @var array
     */
    public $mysteryNumbers;
    /**
     * @var array
     */
    public $mysteries;
    /**
     * @var array
     */
    public $fruits;

    /**
     * Rosary7 constructor.
     * @param MysteryType $mysteryType
     */
    function __construct(MysteryType $mysteryType)
    {
        $this->mysteryType = $mysteryType;
        $this->setMysteryNumbers();
        $this->setMysteries();
        $this->setFruits();
        print "In Rosary constructor\n";
    }

    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return 'Rosary';
    }

    /**
     * Prints the rosary prayer for the current date.
     * @return void
     */
    function printRosary(): void
    {
        for ($decadeNumber = 1; $decadeNumber<6; $decadeNumber++)
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
     * Sets the mystery numbers for a rosary.
     * @return void
     */
    function setMysteryNumbers(): void
    {
        $this->mysteryNumbers = [
            1=>'first',
            2=>'second',
            3=>'third',
            4=>'fourth',
            5=>'fifth',
        ];
    }

    /**
     * Gets the mystery numbers for a rosary.
     * @return array
     */
    function getMysteryNumbers(): array
    {
        return $this->mysteryNumbers;
    }

    /**
     * Sets the mysteries for a rosary.
     * @return void
     */
    function setMysteries(): void
    {
        $this->mysteries = [
            1=>'Resurrection',
            2=>'Ascension',
            3=>'Descent of the Holy Ghost upon the apostles and disciples',
            4=>'Assumption',
            5=>'Coronation of Mary as Queen of Heaven and Earth',
        ];
    }

    /**
     * Gets the mysteries for a rosary.
     * @return array
     */
    function getMysteries(): array
    {
        return $this->mysteries;
    }

    /**
     * Sets the fruits for a rosary.
     * @return void
     */
    function setFruits(): void
    {
        $this->fruits = [
            1=>'faith',
            2=>'hope',
            3=>'love of God',
            4=>'grace of a happy death',
            5=>'trust in Mary\'s intercession',
        ];
    }

    /**
     * Gets the fruits for a rosary.
     * @return array
     */
    function getFruits(): array
    {
        return $this->fruits;
    }
}

$date = new Date();
$mysteryType = new MysteryType($date);
$rosary = new Rosary7($mysteryType);
$rosary->printRosary();
