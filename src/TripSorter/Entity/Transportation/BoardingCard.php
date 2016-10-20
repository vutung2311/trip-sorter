<?php

namespace TripSorter\Entity\Transportation;

/**
 * Boarding card abstract class
 */
abstract class BoardingCard
{

    /**
     * Transportation number
     *
     * @var string
     */
    protected $number;

    /**
     * Transportation type
     *
     * @var string
     */
    protected $type;

    /**
     * Seat assignment
     *
     * @var string|null
     */
    protected $seatAssignment;

    /**
     * The origin of this transportation
     *
     * @var string|null
     */
    protected $origin;

    /**
     * The destination of this transportation
     *
     * @var string|null
     */
    protected $destination;

    /**
     * Note for this boarding card
     *
     * @var string
     */
    protected $note;

    /**
     * Get transportation number
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Set transportation number
     *
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * Return type of transportation
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set type of transportation
     *
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * Get seat assignment
     *
     * @return string|null
     */
    public function getSeatAssignment(): string
    {
        return $this->seatAssignment;
    }

    /**
     * Set seat assignment
     *
     * @param string|null $seatAssignment
     */
    public function setSeatAssignment(string $seatAssignment)
    {
        $this->seatAssignment = $seatAssignment;
    }

    /**
     * Return origin of transportation
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set origin of transportation
     *
     * @param string $origin
     */
    public function setOrigin(string $origin)
    {
        $this->origin = $origin;
    }

    /**
     * Return destination of transportation
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set destination of transportation
     *
     * @param string $destination
     */
    public function setDestination(string $destination)
    {
        $this->destination = $destination;
    }

    /**
     * Return note of this boarding card
     *
     * @return string|null
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * Set note of this boarding card
     *
     * @param string $note
     */
    public function setNote(string $note)
    {
        $this->note = $note;
    }

}