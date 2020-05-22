<?php

namespace Tiime\TechnicalDebtTracker\Tests;

use PHPUnit\Framework\TestCase;
use Tiime\TechnicalDebtTracker\Category;
use Tiime\TechnicalDebtTracker\TrackerConfig;

class TrackerConfigTest extends TestCase
{
    /**
     * @test
     * @todo
     */
    public function inProgress()
    {
        $config = new TrackerConfig([]);

        $config->addCategory(new Category('security', 500));
        $config->addCategory(new Category('standard violation', 50));
    }
}
