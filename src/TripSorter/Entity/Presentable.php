<?php

namespace TripSorter\Entity;

/**
 * Interface where a presentable boarding card must implement
 */
interface Presentable
{

    /**
     * Return description of presentable object
     *
     * @return string
     */
    public function getDescription(): string;

}