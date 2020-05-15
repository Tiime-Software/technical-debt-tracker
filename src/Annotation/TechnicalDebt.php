<?php

namespace Tiime\TechnicalDebtTracker\Annotation;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\Target;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * @Annotation
 * @Target({"CLASS", "METHOD", "PROPERTY"})
 */
final class TechnicalDebt
{
    /**
     * @var int
     * @Required
     */
    public $category;

    /**
     * @var string
     * @Required
     */
    public $reporter;

    /**
     * @var string
     * @Required
     */
    public $description;
}