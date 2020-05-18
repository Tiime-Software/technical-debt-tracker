<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnMethods;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(category=5, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public function methodA()
    {

    }

    /**
     * @TechnicalDebt(category=2, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    protected function methodB()
    {

    }

    /**
     * @TechnicalDebt(category=1, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    private function methodC()
    {

    }
}
