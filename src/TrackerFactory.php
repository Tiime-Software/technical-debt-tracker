<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;

final class TrackerFactory
{
    public static function create($namespace, $category = []): Tracker
    {
        if (true === empty($category)) {
            $category = [
                Category::securityIssue(),
                Category::hardToUnderstand(),
                Category::criticalPart()
            ];
        }

        return new Tracker(new TrackerConfig((array) $namespace, (array) $category), new AnnotationReader());
    }
}
