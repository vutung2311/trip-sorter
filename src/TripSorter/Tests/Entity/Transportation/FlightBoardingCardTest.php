<?php
namespace TripSorter\Tests\Entity\Transportation;

use PHPUnit_Framework_TestCase;
use TripSorter\Entity\Transportation\FlightBoardingCard;

/**
 * Test class for {@link \TripSorter\Entity\Transportation\FlightBoardingCard}
 */
class FlightBoardingCardTest extends PHPUnit_Framework_TestCase
{

    /**
     * System under test
     *
     * @var FlightBoardingCard
     */
    private $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->sut = new FlightBoardingCard();
        $this->sut->setOrigin('Gerona Airport');
        $this->sut->setDestination('Stockholm');
        $this->sut->setNumber('SK455');
        $this->sut->setBoardingGate('45B');
        $this->sut->setSeatAssignment('3A');
        $this->sut->setNote('Baggage drop at ticket counter 344.');

    }

    /**
     * Test function getDescription
     */
    public function testGetDescription()
    {
        static::assertSame(
<<<DESCRIPTION
From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
DESCRIPTION
            ,
            $this->sut->getDescription(),
            'Wrong description generated by boarding card.'
        );
    }

}