<?php

namespace TripSorter\Presenter;

use TripSorter\Entity\Presentable;
use TripSorter\Entity\Transportation\BoardingCard;

/**
 * Trip presenter class
 */
class Presenter
{

    /**
     * Take an array or ordered boarding cards and present how to complete the journey
     *
     * @param array|Presentable[] $orderedBoardingCards
     * @return string
     */
    public static function present(array $orderedBoardingCards): string {
        $index = 1;
        $description = '';

        foreach($orderedBoardingCards as $boardingCard){
            $description .= sprintf('%d. %s'.PHP_EOL, $index, $boardingCard->getDescription());
            ++$index;
        }
        $description .= sprintf('%d. You have arrived at your final destination.', $index);

        return $description;
    }

}