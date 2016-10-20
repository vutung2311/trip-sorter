<?php

namespace TripSorter\Entity\Transportation;
use TripSorter\Entity\Presentable;

/**
 * Boarding card for flight
 */
class FlightBoardingCard extends BoardingCard implements Presentable
{

    /**
     * Transportation type is flight
     *
     * @var string
     */
    protected $type = 'flight';

    /**
     * Journey description template
     *
     * @var string
     */
    const JOURNEY_DESCRIPTION_TEMPLATE = 'From %s, take %s %s to %s. Gate %s, seat %s. %s';

    /**
     * Boarding gate of this flight boarding card
     *
     * @var string
     */
    protected $boardingGate;

    /**
     * Get boarding gate of this flight boarding card
     *
     * @return string
     */
    public function getBoardingGate(): string
    {
        return $this->boardingGate;
    }

    /**
     * Set boarding gate of this flight boarding card
     *
     * @param string $boardingGate
     */
    public function setBoardingGate(string $boardingGate)
    {
        $this->boardingGate = $boardingGate;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): string
    {
        return sprintf(
            self::JOURNEY_DESCRIPTION_TEMPLATE,
            $this->getOrigin(),
            $this->getType(),
            $this->getNumber(),
            $this->getDestination(),
            $this->getBoardingGate(),
            $this->getSeatAssignment(),
            $this->getNote()
        );
    }

}