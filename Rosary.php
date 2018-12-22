<?php

declare(strict_types=1);

namespace Rosary;

/**
 * Class Rosary
 * @package Rosary
 */
class Rosary
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
        switch ($decadeNumber)
        {
            case 1:
                return 'first';
            case 2:
                return 'second';
            case 3:
                return 'third';
            case 4:
                return 'fourth';
            case 5:
                return 'fifth';
        }
    }

    /**
     * Gets the mystery type for a rosary.
     * @return string
     */
    function getMysteryType(): string
    {
        //May want to make mysteryType an instance variable
        if (date('j') % 3 == 0)
        {
            return 'sorrowful';
        }
        elseif (date('j') % 3 == 1)
        {
            return 'glorious';
        }
        else
        {
            return 'joyful';
        }
    }

    /**
     * Gets the mystery for a rosary.
     * @param int $decadeNumber
     * @return string
     */
    function getMystery(int $decadeNumber): string
    {
        switch ($decadeNumber)
        {
            case 1:
                return 'first';
            case 2:
                return 'second';
            case 3:
                return 'third';
            case 4:
                return 'fourth';
            case 5:
                return 'fifth';
        }
    }

    /**
     * Gets the fruit for a rosary.
     * @param int $decadeNumber
     * @return string
     */
    function getFruit(int $decadeNumber): string
    {
        switch ($decadeNumber)
        {
            case 1:
                return 'faith';
            case 2:
                return 'hope';
            case 3:
                return 'love of God';
            case 4:
                return 'grace of a happy death';
            case 5:
                return "trust in Mary's intercession";
        }
    }
}

$rosary = new Rosary();
$rosary->printRosary();
