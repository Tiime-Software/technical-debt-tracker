<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnClasses\TrackerMustGoDeeper;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Category;

/**
 * @TechnicalDebt(categories={Category::HARD_TO_UNDERSTAND, Category::CRITICAL_PART}, reporter="Flavien Rodrigues", description="Lorem ipsum")
 */
class TechnicalDebtInside
{

}
