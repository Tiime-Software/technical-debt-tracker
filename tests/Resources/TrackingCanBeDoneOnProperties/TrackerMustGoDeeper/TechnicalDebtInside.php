<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnProperties\TrackerMustGoDeeper;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(category=3, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public $propertyA;

    /**
     * @TechnicalDebt(category=2, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public $propertyB;

    /**
     * @TechnicalDebt(category=1, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public $propertyC;
}
