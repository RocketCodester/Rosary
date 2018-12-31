<?php

declare(strict_types=1);

namespace Rosary;

use Monolog\Logger;

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
     * @var Weekday
     */
    private $date;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * MysteryType constructor.
     * @param Weekday $weekday
     * @param Logger $logger
     */
    function __construct(Weekday $weekday, Logger $logger)
    {
        $this->logger = $logger;
        $this->date = $weekday;
        $this->setMysteryType($weekday->getWeekday());
        $logger->info(__CLASS__ . " constructor was called\n");
    }

    /**
     * Sets the mystery type.
     * @param int $date
     */
    function setMysteryType(int $date): void
    {
        $this->logger->info(__METHOD__ . " received: ", func_get_args());
        $this->mysteryType = ['glorious', 'sorrowful', 'joyful'][$date % 3];
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
