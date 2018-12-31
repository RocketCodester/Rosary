<?php

declare(strict_types=1);

namespace MyRosary;

use Monolog\Logger;

require '../../../vendor/autoload.php';

/**
 * Class GenericRosary
 * @package Rosary
 */
class GenericRosary extends Rosary
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
     * GenericRosary constructor.
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
        return 'GenericRosary';
    }
}

$logger = new Logger('rosary_app');
$genericRosary = new GenericRosary($logger);
$genericRosary->setMysteryType(Rosary::getCurrentDateMysteryType());
$genericRosary->setMysteries([1,2,3,4,5]);
$genericRosary->setFruits([1,2,3,4,5]);
$genericRosary->setRosaryPrayer();
echo $genericRosary->getRosaryPrayer();
