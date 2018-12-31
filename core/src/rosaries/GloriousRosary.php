<?php

declare(strict_types=1);

namespace MyRosary;

use Monolog\Logger;

/**
 * Class GloriousRosary
 * @package Rosary
 */
class GloriousRosary extends Rosary
{
    /**
     * @var string
     */
    protected $mysteryType = 'glorious';
    /**
     * @var array
     */
    protected $mysteries = [
        "Resurrection",
        "Ascension",
        "Descent of the Holy Ghost upon the apostles and disciples",
        "Assumption",
        "Coronation of Mary as Queen of heaven and earth",
    ];
    /**
     * @var array
     */
    protected $fruits = [
        'faith',
        'hope',
        'love of God',
        'grace of a happy death',
        "trust in Mary's intercession",
    ];
    /**
     * @var Logger
     */
    private $logger;

    /**
     * GloriousRosary constructor.
     * @param Logger $logger
     */
    function __construct(Logger $logger)
    {
        parent::__construct($logger);
        $this->logger = $logger;
        $logger->info(__CLASS__ . " constructor was called\n");
    }
    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return 'GloriousRosary';
    }
}
