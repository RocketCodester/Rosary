<?php

declare(strict_types=1);

namespace Rosary\src;

use Symfony\Component\Yaml\Yaml;
use Monolog\Logger;

class Rosary8
{
    /**
     * @var MysteryType
     */
    private $mysteryType;
    /**
     * @var array
     */
    private $rosary;
    /**
     * @var array
     */
    private $mysteryNumbers = ['first', 'second', 'third', 'fourth', 'fifth'];
    /**
     * @var array
     */
    private $mysteries;
    /**
     * @var array
     */
    private $fruits;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * Rosary8 constructor.
     * @param MysteryType $mysteryType
     * @param Logger $logger
     */
    function __construct(MysteryType $mysteryType, Logger $logger)
    {
        $this->logger = $logger;
        $this->mysteryType = $mysteryType;
        $this->setRosaryData();
        $this->setMysteries();
        $this->setFruits();
        $logger->info(__CLASS__ . " constructor was called\n");
    }

    /**
     * Prints the rosary prayer for the current date.
     * @return string
     */
    function getRosary(): string
    {
        $rosary = '';
        for ($decadeNumber = 0; $decadeNumber<5; $decadeNumber++)
        {
            $rosary .= 'The ' . $this->getMysteryNumbers()[$decadeNumber] . ' ' . $this->mysteryType->getMysteryType() . ' mystery is the ' .
                $this->getMysteries()[$decadeNumber] . '. Fruit of the mystery is ' . $this->getFruits()[$decadeNumber] . ".\n";
            $rosary .= "Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.\n";
            for ($hailMaryNumber = 0; $hailMaryNumber < 10; $hailMaryNumber++)
            {
                $rosary .= "Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.\n";
            }
            $rosary .= "Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.\n\n";
        }
        return $rosary;
    }

    /**
     * Sets the rosary array.
     * @return void
     */
    function setRosaryData(): void
    {
        $this->rosary = Yaml::parseFile('C:\xampp\htdocs\Rosary\tests\rosary8.yaml');
    }

    /**
     * Gets the rosary array.
     * @return array
     */
    function getRosaryData(): array
    {
        return $this->rosary;
    }

    /**
     * Sets the mystery numbers.
     * @return void
     */
    function setMysteryNumbers(): void
    {
        $this->mysteryNumbers = array_keys($this->rosary[$this->mysteryType->getMysteryType()]);
    }

    /**
     * Gets the mystery numbers.
     * @return array
     */
    function getMysteryNumbers(): array
    {
        return $this->mysteryNumbers;
    }

    /**
     * Sets the mysteries.
     * @return void
     */
    function setMysteries(): void
    {
        $mysteryNumbers = $this->rosary[$this->mysteryType->getMysteryType()];

        $mysteryCount = 0;
        foreach ($mysteryNumbers as $mysteryNumber)
        {
            $this->mysteries[$mysteryCount++] = $mysteryNumber[0];
        }
    }

    /**
     * Gets the mysteries.
     * @return array
     */
    function getMysteries(): array
    {
        return $this->mysteries;
    }

    /**
     * Sets the fruits of the mysteries.
     * @return  void
     */
    function setFruits(): void
    {
        $mysteryNumbers = $this->rosary[$this->mysteryType->getMysteryType()];
        $mysteryCount = 0;
        foreach ($mysteryNumbers as $mysteryNumber)
        {
            $this->fruits[$mysteryCount++] = $mysteryNumber[1];
        }
    }

    /**
     * Gets the fruits of the mysteries.
     * @return array
     */
    function getFruits(): array
    {
        return $this->fruits;
    }
    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return 'Rosary8';
    }
}
