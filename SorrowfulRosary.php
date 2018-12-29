<?php

declare(strict_types=1);

namespace Rosary;
use Monolog\Logger;

require "vendor/autoload.php";
require_once("MysteryType.php");

/**
 * Class SorrowfulRosary
 * @package Rosary
 */
class SorrowfulRosary extends Rosary
{
    /**
     * @var string
     */
    protected $mysteryType = 'sorrowful';
    /**
     * @var array
     */
    protected $mysteries = [
        "Agony in the Garden",
        "Scourging at the Pillar",
        "Crowning with Thorns",
        "Carrying of the Cross",
        "Crucifixion",
    ];
    /**
     * @var array
     */
    protected $fruits = [
        'contrition (or sorrow) for sin',
        'purity',
        'courage',
        'patience',
        "perseverance",
    ];
    /**
     * @var Logger
     */
    private $logger;

    /**
     * SorrowfulRosary constructor.
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
        return 'SorrowfulRosary';
    }
}

$logger = new Logger('rosary_app');
$sorrowfulRosary = new SorrowfulRosary($logger);
$sorrowfulRosary->setRosary();
echo $sorrowfulRosary->getRosary();
