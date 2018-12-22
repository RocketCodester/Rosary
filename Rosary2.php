<?php

declare(strict_types=1);

namespace Rosary;

/**
 * Class Rosary2
 * @package Rosary
 */
class Rosary2
{
    /**
     * @var string
     */
    public $mysteryType;

    /**
     * Rosary constructor.
     */
    function __construct()
    {
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
            print 'The ' . $this->getMysteryNumber($decadeNumber) . ' ' . $this->getMysteryType() . ' mystery is the ' .
                $this->getMystery($decadeNumber) . '. Fruit of the mystery is ' . $this->getFruit($decadeNumber) . ".\n";
            print "Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.\n";
            for ($hailMaryNumber = 0; $hailMaryNumber < 10; $hailMaryNumber++)
            {
                print "Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.\n";
            }
            print "Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.\n\n";
        }
    }

    /**
     * Gets the mystery number for a rosary.
     * @param int $decadeNumber
     * @return string
     */
    function getMysteryNumber(int $decadeNumber): string
    {
        $mysteryNumbers = [
            1=>'first',
            2=>'second',
            3=>'third',
            4=>'fourth',
            5=>'fifth',
        ];
        return $mysteryNumbers[$decadeNumber];
    }

    /**
     * Gets the mystery type for a rosary.
     * @return string
     */
    function getMysteryType(): string
    {
        //May want to make mysteryType an instance variable
        $mysteryType = [
            0 => 'sorrowful',
            1 => 'glorious',
            2 => 'joyful',
        ];
        return $mysteryType[date('j') % 3];
    }

    /**
     * Gets the mystery for a rosary.
     * @param int $decadeNumber
     * @return string
     */
    function getMystery(int $decadeNumber): string
    {
        $mysteries = [
            1=>'Resurrection',
            2=>'Ascension',
            3=>'Descent of the Holy Ghost upon the apostles and disciples',
            4=>'Assumption',
            5=>'Coronation of Mary as Queen of Heaven and Earth',
        ];
        return $mysteries[$decadeNumber];
    }

    /**
     * Gets the fruit for a rosary.
     * @param int $decadeNumber
     * @return string
     */
    function getFruit(int $decadeNumber): string
    {
        $fruits = [
            1=>'faith',
            2=>'hope',
            3=>'love of God',
            4=>'grace of a happy death',
            5=>'trust in Mary\'s intercession',];
        return $fruits[$decadeNumber];
    }
}

$rosary = new Rosary2();
$rosary->printRosary();
