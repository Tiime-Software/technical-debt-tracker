<?php

namespace Tiime\TechnicalDebtTracker\Tests;

use PHPUnit\Framework\TestCase;
use Tiime\TechnicalDebtTracker\Command\Score;
use Tiime\TechnicalDebtTracker\TrackerFactory;

class TrackerTest extends TestCase
{
    /** @test */
    public function trackingCanBeDoneOnClasses()
    {
        $this->assertEquals(
            500,
            (new Score())->analyzeWith(TrackerFactory::create(
                'Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnClasses'
            ))
        );
    }

    /** @test */
    public function trackingCanBeDoneOnProperties()
    {
        $this->assertEquals(
            1500,
            (new Score())->analyzeWith(TrackerFactory::create(
                'Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnProperties'
            ))
        );
    }

    /** @test */
    public function trackingCanBeDoneOnMethods()
    {
        $this->assertEquals(
            1500,
            (new Score())->analyzeWith(TrackerFactory::create(
                'Tiime\\TechnicalDebtTracker\\Tests\\Resources\\TrackingCanBeDoneOnMethods'
            ))
        );
    }

    /** @test */
    public function multipleTrackingCanBeDoneOnSameTarget()
    {
        $this->assertEquals(
            1215,
            (new Score())->analyzeWith(TrackerFactory::create(
                'Tiime\\TechnicalDebtTracker\\Tests\\Resources\\MultipleTrackingCanBeDoneOnSameTarget'
            ))
        );
    }
}
