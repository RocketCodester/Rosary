<?php

declare(strict_types=1);

namespace MyRosary;

use Monolog\Logger;

/**
 * Class Rosary
 * @package Rosary
 */
abstract class Rosary
{
    const GLORY_BE = "Glory be to the Father, and to the Son, and to the Holy Spirit, as it was in the beginning, is now, and ever shall be, world without end. Amen.\n\n";
    const HAIL_MARY = "Hail Mary, full of grace. The Lord is with thee. Blessed art thou amongst women, and blessed is the fruit of thy womb, Jesus. Holy Mary, Mother of God, pray for us sinners, now and at the hour of our death, Amen.\n";
    const OUR_FATHER = "Our Father, Who art in heaven, hallowed be Thy name; Thy kingdom come; Thy will be done on earth as it is in heaven. Give us this day our daily bread; and forgive us our trespasses as we forgive those who trespass against us; and lead us not into temptation, but deliver us from evil. Amen.\n";
    const MYSTERY_NUMBERS = ['first', 'second', 'third', 'fourth', 'fifth'];
    /**
     * @var string
     */
    private $rosaryPrayer;
    /**
     * @var string
     */
    protected $mysteryType;
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
     * Rosary constructor.
     * @param Logger $logger
     */
    function __construct(Logger $logger)
    {
        $this->logger = $logger;
        $logger->info(__CLASS__ . " constructor was called\n");
    }

    /**
     * Sets the mysteries.
     * @param array $mysteries
     * @return void
     */
    final function setMysteries(array $mysteries): void
    {
        $this->mysteries = $mysteries;
    }

    /**
     * Gets the mysteries.
     * @return array
     */
    final function getMysteries(): array
    {
        return $this->mysteries;
    }

    /**
     * Sets the fruits of the mysteries.
     * @param array $fruits
     * @return  void
     */
    final function setFruits(array $fruits): void
    {
        $this->fruits = $fruits;
    }

    /**
     * Gets the fruits of the mysteries.
     * @return array
     */
    final function getFruits(): array
    {
        return $this->fruits;
    }

    /**
     * Gets the mystery type for the rosary.
     * @return string
     */
    final function getMysteryType(): string
    {
        return $this->mysteryType;
    }

    /**
     * Sets the mystery type for the rosary.
     * @param string $mysteryType
     * @return void
     */
    final function setMysteryType(string $mysteryType): void
    {
        $this->mysteryType = $mysteryType;
    }

    /**
     * Gets the current date's mystery type.
     * @param bool $luminous
     * @return string
     */
    static final function getCurrentDateMysteryType(bool $luminous = false): string
    {
        if (!$luminous)
        {
            return ['glorious', 'joyful', 'sorrowful'][getdate()['wday'] % 3];
        }
        return ['glorious', 'joyful', 'sorrowful', 'glorious', 'luminous', 'sorrowful', 'joyful'][getdate()['wday'] % 7];
    }

    /**
     * String casting magic method.
     * @return string
     */
    function __toString(): string
    {
        return 'GloriousRosary';
    }

    /**
     * Sets the glorious rosaryPrayer.
     * @return void
     */
    final function setRosaryPrayer(): void
    {
        for ($decadeNumber = 0; $decadeNumber<5; $decadeNumber++)
        {
            $this->rosaryPrayer .= 'The ' . self::MYSTERY_NUMBERS[$decadeNumber] . ' ' . $this->mysteryType . ' mystery is the ' .
                $this->mysteries[$decadeNumber] . '. Fruit of the mystery is ' . $this->fruits[$decadeNumber] . ".\n";
            $this->rosaryPrayer .= self::OUR_FATHER;
            for ($hailMaryNumber = 0; $hailMaryNumber < 10; $hailMaryNumber++)
            {
                $this->rosaryPrayer .= self::HAIL_MARY;
            }
            $this->rosaryPrayer .= self::GLORY_BE;
        }
    }

    /**
     * Gets the glorious rosary prayer.
     * @return string
     */
    final function getRosaryPrayer(): ?string
    {
        return $this->rosaryPrayer;
    }
}
