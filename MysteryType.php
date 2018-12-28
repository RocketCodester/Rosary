<?php

declare(strict_types=1);

namespace Rosary;

use Monolog\Logger;

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
     * @var Logger
     */
    private $logger;

    /**
     * MysteryType constructor.
     * @param Date $date
     * @param Logger $logger
     */
    function __construct(Date $date, Logger $logger)
    {
        $this->logger = $logger;
        $this->date = $date;
        $this->setMysteryType($date->getDate());
        $logger->info(__CLASS__ . " constructor was called\n");
    }

    /**
     * Sets the mystery type.
     * @param int $date
     */
    function setMysteryType(int $date): void
    {
        $this->logger->info(__METHOD__ . " received: ", func_get_args());
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
