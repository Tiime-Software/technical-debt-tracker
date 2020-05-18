<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;

class TrackerFactory
{
    public static function create(string ...$namespace): Tracker
    {
        return new Tracker(new TrackerConfig($namespace), new AnnotationReader());
    }
}
