<?php

namespace Tiime\TechnicalDebtTracker;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

interface TrackerInterface
{
    /**
     * @return \Generator<TechnicalDebt>
     */
    public function getTechnicalDebtAnnotations(): \Generator;
}
