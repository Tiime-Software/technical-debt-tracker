<?php

namespace Tiime\TechnicalDebtTracker\Command;

use League\CLImate\CLImate;
use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\Tracker;

class Report
{
    public function display(Tracker $tracker): array
    {
        $report = $this->analyzeWith($tracker);


        $output = new CLImate();
        $output->info('Nothing fancy here. Just some info.');
        $table = [];
        foreach ($report['_stats'] as $category => $value) {
            $table[] = [
                'category' => $category,
                'percent' => sprintf("%.2f%%", $value['percent']),
                'score' => $value['score'],
            ];
        }

        $c = array_column($table, 'percent');
        array_multisort($c, SORT_DESC, $table);


        $output->table($table);
        return [];
    }

    public function analyzeWith(Tracker $tracker): array
    {
        $report = [];
        $total = 0;
        $totalByCategory = [];
        $scoreByCategory = [];

        foreach ($tracker->getTechnicalDebtAnnotations() as $annotation) {
            if (false === $annotation instanceof TechnicalDebt) {
                continue;
            }

            foreach ($annotation->categories as $category) {
                $report[$category][] = [
                    'reporter' => $annotation->reporter,
                    'description' => $annotation->description,
                ];

                if (!isset($totalByCategory[$category])) {
                    $totalByCategory[$category] = 0;
                    $scoreByCategory[$category] = 0;
                }

                $totalByCategory[$category]++;
                $scoreByCategory[$category] += $tracker->getConfig()->getCategory($category)->getScore();
                $total++;
            }
        }


        $stats = [];
        foreach ($report as $category => $annotations) {
            $stats[$category] = [
                'percent' => $totalByCategory[$category] / $total * 100,
                'score' => $scoreByCategory[$category],
            ];
        }

        $report['_stats'] = $stats;

        return $report;
    }
}
