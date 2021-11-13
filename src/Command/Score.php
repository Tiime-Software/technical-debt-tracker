<?php

namespace Tiime\TechnicalDebtTracker\Command;

use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Tracker;

class Score
{
    public function analyzeWith(Tracker $tracker): int
    {
        $score = 0;

        foreach ($tracker->getTechnicalDebtAnnotations() as $annotation) {
            $score += $this->computeScoreFrom($tracker, $annotation);
        }

        return $score;
    }

    private function computeScoreFrom($tracker, $annotation): int
    {
        $score = 0;
        if ($annotation instanceof TechnicalDebt) {
            foreach ($annotation->categories as $categoryName) {
                $score += $tracker->getConfig()->getCategory($categoryName)->getScore();
            }
        }

        return $score;
    }
}