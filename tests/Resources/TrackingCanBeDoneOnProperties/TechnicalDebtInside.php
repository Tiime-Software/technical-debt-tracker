<?php

namespace Tiime\TechnicalDebtTracker\Tests\Resources\TrackingCanBeDoneOnProperties;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Category;

class TechnicalDebtInside
{
    /**
     * @TechnicalDebt(
     *     categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE},
     *     reporter="Flavien Rodrigues",
     *     description="Lorem ipsum"
     * )
     */
    public $propertyA;

    /**
     * @TechnicalDebt(
     *     categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE},
     *     reporter="Flavien Rodrigues",
     *     description="Lorem ipsum"
     * )
     */
    protected $propertyB;

    /**
     * @TechnicalDebt(
     *     categories={Category::HARD_TO_UNDERSTAND, Category::CORE_FEATURE},
     *     reporter="Flavien Rodrigues",
     *     description="Lorem ipsum"
     * )
     */
    private $propertyC;

    public $propertyD;

    protected $propertyE;

    private $propertyF;
}
