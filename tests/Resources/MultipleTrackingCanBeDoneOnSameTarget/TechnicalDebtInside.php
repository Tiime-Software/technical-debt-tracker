<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\MultipleTrackingCanBeDoneOnSameTarget;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Category;

/**
 * @deprecated this deprecated is for testing purpose
 * @todo this todo is for testing purpose
 *
 * @TechnicalDebt(
 *     categories={Category::SECURITY_ISSUE, Category::CORE_FEATURE},
 *     reporter="Flavien Rodrigues",
 *     description="Lorem ipsum"
 * )
 * @TechnicalDebt(
 *     categories={Category::BAD_PRACTICE, Category::NEED_DOCUMENTATION},
 *     reporter="Flavien Rodrigues",
 *     description="Lorem ipsum"
 * )
 */
class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(
     *     categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE},
     *     reporter="Flavien Rodrigues",
     *     description="Lorem ipsum"
     * )
     * @TechnicalDebt(categories={Category::TIGHTLY_COUPLED}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     */
    private $propertyA;

    /**
     * @TechnicalDebt(categories={Category::DELAYED_REFACTORING}, reporter="Flavien Rodrigues", description="Lorem")
     * @TechnicalDebt(categories={Category::NEED_TESTS}, reporter="Flavien Rodrigues", description="Lorem ipsum")
     * @TechnicalDebt(reporter="Flavien Rodrigues", description="Lorem ipsum", issue_link="https://...")
     */
    public function methodA()
    {
    }
}
