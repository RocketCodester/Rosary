<?php

declare(strict_types=1);

namespace Rosary;

/**
 * Class Date
 * @package Rosary
 */
class Date
{
    /**
     * @var int
     */
    private $date;

    /**
     * Date constructor.
     */
    function __construct()
    {
        $this->setDate();
        print "In Date constructor\n";
    }

    /**
     * Sets the date.
     */
    function setDate(): void
    {
        $this->date = (int) date('j');
    }

    /**
     * Gets the date.
     * @return int
     */
    function getDate(): int
    {
        return $this->date;
    }

    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return "Date";
    }
}
