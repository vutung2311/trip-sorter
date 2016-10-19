<?php

namespace TripSorter\Sorter;

use TripSorter\Entity\Transportation\BoardingCard;

/**
 * Trip sorter class
 */
class TripSorter
{

    /**
     * Get unordered boarding cards and return ordered boarding cards
     *
     * @param array|BoardingCard[] $boardingCards Unordered boarding cards
     * @return array Ordered boarding cards
     */
    public static function sort(array $boardingCards): array {
        $orderedBoardingCards = [];
        $destinationHashTable = [];
        $originHashTable = [];
        /** @var BoardingCard[] $firstBoardingCard */
        $firstBoardingCard = null;

        foreach ($boardingCards as $boardingCard) {
            $destinationHashTable[$boardingCard->getDestination()] = $boardingCard;
            $originHashTable[$boardingCard->getOrigin()] = $boardingCard;
        }
        foreach ($boardingCards as $boardingCard) {
            if (!isset($destinationHashTable[$boardingCard->getOrigin()])) {
                $firstBoardingCard = $boardingCard;
            }
        }
        $orderedBoardingCards[] = $firstBoardingCard;

        /** @var BoardingCard $previousBoardingCard */
        $previousBoardingCard = end($orderedBoardingCards);
        while(isset($originHashTable[$previousBoardingCard->getDestination()])) {
            $orderedBoardingCards[] = $originHashTable[$previousBoardingCard->getDestination()];
            $previousBoardingCard = end($orderedBoardingCards);
        }

        return $orderedBoardingCards;
    }

}