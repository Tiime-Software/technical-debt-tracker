<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnMethods;

class NoTechnicalDebtInside
{
    public function methodA()
    {

    }

    protected function methodB()
    {

    }

    private function methodC()
    {

    }
}
