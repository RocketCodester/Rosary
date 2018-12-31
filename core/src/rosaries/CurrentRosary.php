<?php

declare(strict_types=1);

namespace MyRosary;

use Monolog\Logger;

require '../../../vendor/autoload.php';

/**
 * Class CurrentRosary
 * @package Rosary
 */
class CurrentRosary extends Rosary
{
    /**
     * @var string
     */
    protected $mysteryType = '';
    /**
     * @var array
     */
    protected $mysteries = [];
    /**
     * @var array
     */
    protected $fruits = [];
    /**
     * @var Logger
     */
    private $logger;

    /**
     * CurrentRosary constructor.
     * @param Logger $logger
     */
    function __construct(Logger $logger)
    {
        parent::__construct($logger);
        $this->logger = $logger;
        $this->mysteryType = $this::getCurrentDateMysteryType();
        $logger->info(__CLASS__ . " constructor was called\n");
    }
    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return 'CurrentRosary';
    }
}

$logger = new Logger('rosary_app');
$currentRosary = new CurrentRosary($logger);
$currentRosary->setMysteries([1,2,3,4,5]);
$currentRosary->setFruits([1,2,3,4,5]);
$currentRosary->setRosaryPrayer();
echo $currentRosary->getRosaryPrayer();
