<?php

declare(strict_types=1);

namespace MyRosary;

use Monolog\Logger;

/**
 * Class Date
 * @package Rosary
 */
class Weekday
{
    /**
     * @var int
     */
    private $weekday;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * Date constructor.
     * @param Logger $logger
     */
    function __construct(Logger $logger)
    {
        $this->logger = $logger;
        $this->setWeekday();
        $logger->info(__CLASS__ . " constructor was called\n");
    }

    /**
     * Sets the date.
     * @return void
     */
    function setWeekday(): void
    {
        $this->weekday = getdate()['wday'] % 3;
    }

    /**
     * Gets the date.
     * @return int
     */
    function getWeekday(): int
    {
        return $this->weekday;
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
