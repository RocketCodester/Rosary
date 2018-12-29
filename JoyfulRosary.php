<?php

declare(strict_types=1);

namespace Rosary;
use Monolog\Logger;

require "vendor/autoload.php";
require_once("MysteryType.php");

/**
 * Class JoyfulRosary
 * @package Rosary
 */
class JoyfulRosary extends Rosary
{
    /**
     * @var string
     */
    protected $mysteryType = 'joyful';
    /**
     * @var array
     */
    protected $mysteries = [
        "Annunciation",
        "Visitation",
        "Nativity",
        "Presentation",
        "Finding of the child, Jesus, in the Temple",
    ];
    /**
     * @var array
     */
    protected $fruits = [
        'humility',
        'love of neighbor',
        'poverty',
        'obedience',
        "joy in finding Jesus",
    ];
    /**
     * @var Logger
     */
    private $logger;

    /**
     * JoyfulRosary constructor.
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
        return 'JoyfulRosary';
    }
}

$logger = new Logger('rosary_app');
$joyfulRosary = new JoyfulRosary($logger);
$joyfulRosary->setRosary();
echo $joyfulRosary->getRosary();
