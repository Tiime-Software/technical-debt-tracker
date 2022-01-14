<?php

namespace Tiime\TechnicalDebtTracker;

use HaydenPierce\ClassFinder\ClassFinder;

class ClassProvider
{
    /** @var TrackerConfig */
    private $config;

    public function __construct(TrackerConfig $config)
    {
        $this->config = $config;
    }

    public function getFqcns(): array
    {
        $fqcns = [];

        foreach ($this->config->getNamespaces() as $namespace) {
            try {
                $fqcns = array_merge(
                    $fqcns,
                    ClassFinder::getClassesInNamespace($namespace, ClassFinder::RECURSIVE_MODE)
                );
            } catch (\Throwable $t) {
                throw new \Exception(
                    sprintf(
                        "Could not load FQCNs from namespace %s",
                        $namespace
                    ),
                    0,
                    $t
                );
            }
        }

        return $fqcns;
    }
}
