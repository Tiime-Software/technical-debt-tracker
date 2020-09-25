<?php

namespace Tiime\TechnicalDebtTracker\Tests;

use PHPUnit\Framework\TestCase;
use Tiime\TechnicalDebtTracker\TrackerFactory;

class TrackerTest extends TestCase
{
    /** @test */
    public function trackingCanBeDoneOnClasses()
    {
        $tracker = TrackerFactory::create('Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnClasses');

        $this->assertEquals(500, $tracker->getTechnicalDebtScore());
    }

    /** @test */
    public function trackingCanBeDoneOnProperties()
    {
        $tracker = TrackerFactory::create('Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnProperties');

        $this->assertEquals(1500, $tracker->getTechnicalDebtScore());
    }

    /** @test */
    public function trackingCanBeDoneOnMethods()
    {
        $tracker = TrackerFactory::create('Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnMethods');

        $this->assertEquals(1500, $tracker->getTechnicalDebtScore());
    }

    /** @test */
    public function multipleTrackingCanBeDoneOnSameTarget()
    {
        $tracker = TrackerFactory::create('Tiime\\TechnicalDebtTracker\\Tests\\Resources\\MultipleTrackingCanBeDoneOnSameTarget');

        $this->assertEquals(1215, $tracker->getTechnicalDebtScore());
    }
}
