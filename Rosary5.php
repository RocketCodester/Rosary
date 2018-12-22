<?php

declare(strict_types=1);

namespace Rosary;

/**
 * Class Rosary5
 * @package Rosary
 */
class Rosary5
{
    /**
     * @var string
     */
    public $mysteryType;
    /**
     * @var string
     */
    public $mysteryNumber;
    /**
     * @var string
     */
    public $mystery;
    /**
     * @var string
     */
    public $fruitMystery;

    /**
     * Rosary5 constructor.
     * @param string $mysteryType
     */
    function __construct(string $mysteryType)
    {
        $this->setMysteryType($mysteryType);
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
     * Sets the mystery type for a rosary.
     * @param string $mysteryType
     */
    function setMysteryType(string $mysteryType): void
    {
        $this->mysteryType = $mysteryType;
    }

    /**
     * Gets the mystery type for a rosary.
     * @return string
     */
    function getMysteryType(): string
    {
        return $this->mysteryType;
    }

    /**
     * Prints the rosary prayer for the current date.
     * @return void
     */
    function printRosary(): void
    {
        for ($decadeNumber = 1; $decadeNumber<6; $decadeNumber++)
        {
            print 'The ' . $this->getMysteryNumbers()[$decadeNumber] . ' ' . $this->getMysteryType() . ' mystery is the ' .
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
     * Gets the mystery numbers for a rosary.
     * @return array
     */
    function getMysteryNumbers(): array
    {
        return [
            1=>'first',
            2=>'second',
            3=>'third',
            4=>'fourth',
            5=>'fifth',
        ];
    }

    /**
     * Gets the mystery types for a rosary
     * @return array
     */
    function getMysteryTypes(): array
    {
        return ['sorrowful', 'glorious', 'joyful'];
    }

    /**
     * Gets the mysteries for a rosary.
     * @return array
     */
    function getMysteries(): array
    {
        return [
            1=>'Resurrection',
            2=>'Ascension',
            3=>'Descent of the Holy Ghost upon the apostles and disciples',
            4=>'Assumption',
            5=>'Coronation of Mary as Queen of Heaven and Earth',
        ];
    }

    /**
     * Gets the fruits for a rosary.
     * @return array
     */
    function getFruits(): array
    {
        return [
            1=>'faith',
            2=>'hope',
            3=>'love of God',
            4=>'grace of a happy death',
            5=>'trust in Mary\'s intercession',
        ];
    }
}

$date = ['sorrowful', 'glorious', 'joyful'][date('j') % 3];
$rosary = new Rosary5($date);
$rosary->printRosary();
