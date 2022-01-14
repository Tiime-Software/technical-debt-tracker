<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnClasses;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Category;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @TechnicalDebt(
 *     categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE},
 *     reporter="Flavien Rodrigues",
 *     description="Lorem ipsum"
 * )
 *
 * @Target({"CLASS"}) Other annotations can exists
 */
class TechnicalDebtInside
{
}
