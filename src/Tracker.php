<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;

final class Tracker implements TrackerInterface
{
    /** @var TrackerConfig */
    private $config;

    /** @var TrackerInterface[] */
    private $trackers;

    public function __construct(TrackerConfig $config, TrackerInterface ...$tracker)
    {
        $this->config   = $config;
        $this->trackers = $tracker;

        // TODO : Should be configurable
        AnnotationReader::addGlobalIgnoredName('required');
        AnnotationReader::addGlobalIgnoredName('dataProvider');
        AnnotationReader::addGlobalIgnoredName('test');
        AnnotationReader::addGlobalIgnoredName('group');
    }

    public function getTechnicalDebtAnnotations(): \Generator
    {
        foreach ($this->trackers as $tracker) {
            foreach ($tracker->getTechnicalDebtAnnotations() as $technicalDebtAnnotation) {
                yield $technicalDebtAnnotation;
            }
        }
    }

    public function getConfig(): TrackerConfig
    {
        return $this->config;
    }
}
