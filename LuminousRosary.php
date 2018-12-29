<?php

declare(strict_types=1);

namespace Rosary;
use Monolog\Logger;

require "vendor/autoload.php";
require_once("MysteryType.php");

/**
 * Class GloriousRosary
 * @package Rosary
 */
class LuminousRosary extends Rosary
{
    /**
     * @var string
     */
    protected $mysteryType = 'luminous';
    /**
     * @var array
     */
    protected $mysteries = [
        "Baptism of Jesus",
        "Wedding at Cana",
        "Jesus' proclamation of the Kingdom of God",
        "Transfiguration",
        "Institution of the Eucharist",
    ];
    /**
     * @var array
     */
    protected $fruits = [
        'openness to the Holy Spirit',
        'to Jesus through Mary',
        'repentance and Trust in God',
        'desire for Holiness',
        "adoration",
    ];
    /**
     * @var Logger
     */
    private $logger;

    /**
     * LuminousRosary constructor.
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
        return 'LuminousRosary';
    }
}


$logger = new Logger('rosary_app');
$luminousRosary = new LuminousRosary($logger);
$luminousRosary->setRosary();
echo $luminousRosary->getRosary();
