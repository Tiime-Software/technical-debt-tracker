<?php

namespace Tiime\TechnicalDebtTracker\Tests;

use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Tiime\TechnicalDebtTracker\Tracker;
use Tiime\TechnicalDebtTracker\TrackerConfig;

class TrackerTest extends TestCase
{
    /** @test */
    public function trackingCanBeDoneOnClasses()
    {
        $tracker = new Tracker(new TrackerConfig(['Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnClasses']), new AnnotationReader());

        $this->assertEquals(7, $tracker->getTechnicalDebtScore());
    }

    /** test */
    public function trackingCanBeDoneOnProperties()
    {

    }

    /** test */
    public function trackingCanBeDoneOnMethods()
    {

    }
}
