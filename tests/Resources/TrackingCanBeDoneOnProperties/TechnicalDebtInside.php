<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnMethods;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public $propertyA;

    /**
     * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    protected $propertyB;

    /**
     * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    private $propertyC;

    public $propertyD;

    protected $propertyE;

    private $propertyF;
}
