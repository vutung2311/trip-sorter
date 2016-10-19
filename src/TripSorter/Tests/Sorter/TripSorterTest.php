<?php

namespace TripSorter\Tests\Sorter;
use TripSorter\Entity\Transportation\BoardingCard;
use TripSorter\Entity\Transportation\BusBoardingCard;
use TripSorter\Entity\Transportation\FlightBoardingCard;
use TripSorter\Entity\Transportation\TrainBoardingCard;
use TripSorter\Sorter\TripSorter;

/**
 * Test class for {@link \TripSorter\Sorter\TripSorter}
 */
class TripSorterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method sort
     *
     * @dataProvider BoardingCardsProvider
     *
     * @param array|BoardingCard[] $unorderedBoardingCards
     * @param array|BoardingCard[] $expectedOrderedBoardingCards
     */
    public function testSort(array $unorderedBoardingCards, array $expectedOrderedBoardingCards)
    {
        static::assertEquals(
            $expectedOrderedBoardingCards,
            TripSorter::sort($unorderedBoardingCards),
            'Method sort did wrong.'
        );
    }

    /**
     * Data provider for {@link testSort}
     */
    public function BoardingCardsProvider()
    {
        $trainBoardingCard = new TrainBoardingCard();
        $trainBoardingCard->setNumber('78A');
        $trainBoardingCard->setSeatAssignment('45B');
        $trainBoardingCard->setOrigin('Madrid');
        $trainBoardingCard->setDestination('Barcelona');

        $busBoardingCard = new BusBoardingCard();
        $busBoardingCard->setType('airport bus');
        $busBoardingCard->setOrigin('Barcelona');
        $busBoardingCard->setDestination('Gerona Airport');

        $flightBoardingCard1 = new FlightBoardingCard();
        $flightBoardingCard1->setOrigin('Gerona Airport');
        $flightBoardingCard1->setDestination('Stockholm');
        $flightBoardingCard1->setNumber('SK455');
        $flightBoardingCard1->setBoardingGate('45B');
        $flightBoardingCard1->setSeatAssignment('3A');
        $flightBoardingCard1->setNote('Baggage drop at ticket counter 344.');

        $flightBoardingCard2 = new FlightBoardingCard();
        $flightBoardingCard2->setOrigin('Stockholm');
        $flightBoardingCard2->setDestination('New York JFK');
        $flightBoardingCard2->setNumber('SK22');
        $flightBoardingCard2->setBoardingGate('22');
        $flightBoardingCard2->setSeatAssignment('7B');
        $flightBoardingCard2->setNote('Baggage will we automatically transferred from your last leg.');

        return [
            'boarding cards in reverse order' => [
                'unorderedBoardingCards' => [
                    $flightBoardingCard2,
                    $flightBoardingCard1,
                    $busBoardingCard,
                    $trainBoardingCard
                ],
                'expectedOrderedBoardingCards' => [
                    $trainBoardingCard,
                    $busBoardingCard,
                    $flightBoardingCard1,
                    $flightBoardingCard2,
                ],
            ],
            'boarding cards in random order #1' => [
                'unorderedBoardingCards' => [
                    $flightBoardingCard1,
                    $trainBoardingCard,
                    $flightBoardingCard2,
                    $busBoardingCard,
                ],
                'expectedOrderedBoardingCards' => [
                    $trainBoardingCard,
                    $busBoardingCard,
                    $flightBoardingCard1,
                    $flightBoardingCard2,
                ],
            ],
            'boarding cards in random order #2' => [
                'unorderedBoardingCards' => [
                    $trainBoardingCard,
                    $flightBoardingCard2,
                    $flightBoardingCard1,
                    $busBoardingCard,
                ],
                'expectedOrderedBoardingCards' => [
                    $trainBoardingCard,
                    $busBoardingCard,
                    $flightBoardingCard1,
                    $flightBoardingCard2,
                ],
            ]
        ];

    }
}
