<?php

namespace TripSorter\Entity\Transportation;

/**
 * Boarding card for train
 */
class TrainBoardingCard extends BoardingCard
{

    /**
     * Transportation type is train
     *
     * @var string
     */
    protected $type = 'train';

    /**
     * Journey description format
     *
     * @var string
     */
    const JOURNEY_DESCRIPTION_TEMPLATE = 'Take %s %s from %s to %s. Sit in seat %s.';

    /**
     * {@inheritdoc}
     */
    public function getDescription(): string
    {
        return sprintf(
            self::JOURNEY_DESCRIPTION_TEMPLATE,
            $this->getType(),
            $this->getNumber(),
            $this->getOrigin(),
            $this->getDestination(),
            $this->getSeatAssignment()
        );
    }

}