<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnMethods;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public function methodA()
    {

    }

    /**
     * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    protected function methodB()
    {

    }

    /**
     * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    private function methodC()
    {

    }

    public function methodD()
    {

    }

    protected function methodE()
    {

    }

    private function methodF()
    {

    }
}
