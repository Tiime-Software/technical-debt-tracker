<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnClasses\TrackerMustGoDeeper;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

/**
 * @TechnicalDebt(categories={"dummy", "other"}, reporter="Flavien Rodrigues", description="Lorem ipsum")
 */
class TechnicalDebtInside
{

}
