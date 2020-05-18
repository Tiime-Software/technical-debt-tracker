<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnProperties;

class NoTechnicalDebtInside
{
    public $propertyA;

    protected $propertyB;

    private $propertyC;
}
