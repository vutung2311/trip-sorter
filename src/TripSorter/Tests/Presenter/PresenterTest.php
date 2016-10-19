<?php

namespace TripSorter\Tests\Presenter;
use TripSorter\Entity\Transportation\BoardingCard;
use TripSorter\Entity\Transportation\BusBoardingCard;
use TripSorter\Entity\Transportation\FlightBoardingCard;
use TripSorter\Entity\Transportation\TrainBoardingCard;
use TripSorter\Presenter\Presenter;

/**
 * Test class for {@link \TripSorter\Presenter\Presenter}
 */
class PresenterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test method present
     *
     * @dataProvider BoardingCardsProvider
     *
     * @param array|BoardingCard[] $orderedBoardingCards Ordered boarding cards
     * @param string $expectedDescription Expected description of the journey
     */
    public function testPresent($orderedBoardingCards, $expectedDescription)
    {
        static::assertSame(
            $expectedDescription,
            Presenter::present($orderedBoardingCards),
            'Presenter present wrong description of the journey.'
        );
    }

    /**
     * Data provider for {@link testPresent}
     */
    public function BoardingCardsProvider()
    {
        $boardingCard1 = new TrainBoardingCard();
        $boardingCard1->setNumber('78A');
        $boardingCard1->setSeatAssignment('45B');
        $boardingCard1->setOrigin('Madrid');
        $boardingCard1->setDestination('Barcelona');

        $boardingCard2 = new BusBoardingCard();
        $boardingCard2->setType('airport bus');
        $boardingCard2->setOrigin('Barcelona');
        $boardingCard2->setDestination('Gerona Airport');

        $boardingCard3 = new FlightBoardingCard();
        $boardingCard3->setOrigin('Gerona Airport');
        $boardingCard3->setDestination('Stockholm');
        $boardingCard3->setNumber('SK455');
        $boardingCard3->setBoardingGate('45B');
        $boardingCard3->setSeatAssignment('3A');
        $boardingCard3->setNote('Baggage drop at ticket counter 344.');

        $boardingCard4 = new FlightBoardingCard();
        $boardingCard4->setOrigin('Stockholm');
        $boardingCard4->setDestination('New York JFK');
        $boardingCard4->setNumber('SK22');
        $boardingCard4->setBoardingGate('22');
        $boardingCard4->setSeatAssignment('7B');
        $boardingCard4->setNote('Baggage will be automatically transferred from your last leg.');

        $boardingCard5 = new TrainBoardingCard();
        $boardingCard5->setNumber('77A');
        $boardingCard5->setSeatAssignment('45B');
        $boardingCard5->setOrigin('Paris');
        $boardingCard5->setDestination('Stockholm');

        $boardingCard6 = new BusBoardingCard();
        $boardingCard6->setType('shuttle bus');
        $boardingCard6->setOrigin('Stockholm');
        $boardingCard6->setDestination('Arlanda Airport');

        $boardingCard7 = new FlightBoardingCard();
        $boardingCard7->setOrigin('Arlanda Airport');
        $boardingCard7->setDestination('Dulles Airport');
        $boardingCard7->setNumber('SK454');
        $boardingCard7->setBoardingGate('45B');
        $boardingCard7->setSeatAssignment('3A');
        $boardingCard7->setNote('Baggage drop at ticket counter 123.');

        $boardingCard8 = new BusBoardingCard();
        $boardingCard8->setType('bus');
        $boardingCard8->setOrigin('Dulles Airport');
        $boardingCard8->setDestination('New York');

        return [
            'first journey' => [
                'orderedBoardingCards' => [
                    $boardingCard1,
                    $boardingCard2,
                    $boardingCard3,
                    $boardingCard4,
                ],
                'expectedDescription' => <<<DESCRIPTION
1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. Take airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will be automatically transferred from your last leg.
5. You have arrived at your final destination.
DESCRIPTION
            ],
            'second journey' => [
                'orderedBoardingCards' => [
                    $boardingCard5,
                    $boardingCard6,
                    $boardingCard7,
                    $boardingCard8,
                ],
                'expectedDescription' => <<<DESCRIPTION
1. Take train 77A from Paris to Stockholm. Sit in seat 45B.
2. Take shuttle bus from Stockholm to Arlanda Airport. No seat assignment.
3. From Arlanda Airport, take flight SK454 to Dulles Airport. Gate 45B, seat 3A. Baggage drop at ticket counter 123.
4. Take bus from Dulles Airport to New York. No seat assignment.
5. You have arrived at your final destination.
DESCRIPTION
            ],
        ];
    }
}
