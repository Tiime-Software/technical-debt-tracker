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

        $this->assertEquals(7, $tracker->getTechnicalDebtScore());
    }

    /** @test */
    public function trackingCanBeDoneOnProperties()
    {
        $tracker = TrackerFactory::create('Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnProperties');

        $this->assertEquals(12, $tracker->getTechnicalDebtScore());
    }

    /** @test */
    public function trackingCanBeDoneOnMethods()
    {
        $tracker = TrackerFactory::create('Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnMethods');

        $this->assertEquals(16, $tracker->getTechnicalDebtScore());
    }
}
