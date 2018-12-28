<?php

declare(strict_types=1);

namespace Rosary;

use Monolog\Logger;

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
        $this->setDate();
        $logger->info(__CLASS__ . " constructor was called\n");
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
