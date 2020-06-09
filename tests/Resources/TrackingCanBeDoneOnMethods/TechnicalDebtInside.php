<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnMethods;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Category;

class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    public function methodA()
    {

    }

    /**
     * @TechnicalDebt(categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    protected function methodB()
    {

    }

    /**
     * @TechnicalDebt(categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE}, reporter="Flavien Rodrigues", description="Lorem ipsum")
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
