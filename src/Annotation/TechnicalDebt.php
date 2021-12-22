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
     * @var string[]
     */
    public $categories;

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

    /**
     * @var string|null
     */
    public $issue_link;

    public function __construct(
        array $categories = [], 
        string $reporter = '', 
        string $description = '', 
        ?string $issue_link = null
    ) {
        $this->categories = $categories;
        $this->reporter = $reporter;
        $this->description = $description;
        $this->issue_link = $issue_link;
    }
}
