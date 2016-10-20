<?php

namespace TripSorter\Entity\Transportation;
use TripSorter\Entity\Presentable;

/**
 * Boarding card for bus
 */
class BusBoardingCard extends BoardingCard implements Presentable
{

    /**
     * Transportation type is bus
     *
     * @var string
     */
    protected $type = 'bus';

    /**
     * Journey description format
     *
     * @var string
     */
    const JOURNEY_DESCRIPTION_TEMPLATE = 'Take %s from %s to %s. No seat assignment.';

    /**
     * {@inheritdoc}
     */
    public function getDescription(): string
    {
        return sprintf(
            self::JOURNEY_DESCRIPTION_TEMPLATE,
            $this->getType(),
            $this->getOrigin(),
            $this->getDestination()
        );
    }

}