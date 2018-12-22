<?php

declare(strict_types=1);

namespace Rosary;

require_once("Date.php");

/**
 * Class MysteryType
 * @package Rosary
 */
class MysteryType
{
    /**
     * @var string
     */
    private $mysteryType;
    /**
     * @var Date
     */
    private $date;

    /**
     * MysteryType constructor.
     * @param Date $date
     */
    function __construct(Date $date)
    {
        $this->date = $date;
        $this->setMysteryType($date->getDate());
        print "In MysteryType constructor\n";
    }

    /**
     * Sets the mystery type.
     * @param int $date
     */
    function setMysteryType(int $date): void
    {
        $this->mysteryType = ['sorrowful', 'glorious', 'joyful'][$date % 3];
    }

    /**
     * Gets the mystery type.
     * @return string
     */
    function getMysteryType(): string
    {
        return $this->mysteryType;
    }

    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return "MysteryType";
    }
}
