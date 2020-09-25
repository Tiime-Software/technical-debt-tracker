<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;
use HaydenPierce\ClassFinder\ClassFinder;
use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;

final class Tracker
{
    /** @var TrackerConfig */
    private $config;

    /** @var AnnotationReader */
    private $reader;

    public function __construct(TrackerConfig $config, AnnotationReader $reader)
    {
        $this->config = $config;
        $this->reader = $reader;

        // TODO : Should be configurable
        AnnotationReader::addGlobalIgnoredName('required');
        AnnotationReader::addGlobalIgnoredName('dataProvider');
        AnnotationReader::addGlobalIgnoredName('test');
        AnnotationReader::addGlobalIgnoredName('group');
    }

    /**
     * @throws \Exception
     */
    private function getFqcns(): array
    {
        $fqcns = [];

        foreach ($this->config->getNamespaces() as $namespace) {
            try {
                $fqcns = array_merge($fqcns, ClassFinder::getClassesInNamespace($namespace, ClassFinder::RECURSIVE_MODE));
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

    /**
     * @throws \Exception
     */
    public function getTechnicalDebtScore(): int
    {
        $score = 0;

        foreach ($this->getFqcns() as $fqcn) {
            $class = new \ReflectionClass($fqcn);

            foreach ($this->reader->getClassAnnotations($class) as $annotation) {
                $score += $this->computeScoreFrom($annotation);
            }

            $methods = $class->getMethods();
            foreach ($methods as $method) {
                foreach ($this->reader->getMethodAnnotations($method) as $annotation) {
                    $score += $this->computeScoreFrom($annotation);
                }
            }

            $properties = $class->getProperties();
            foreach ($properties as $property) {
                foreach ($this->reader->getPropertyAnnotations($property) as $annotation) {
                    $score += $this->computeScoreFrom($annotation);
                }
            }
        }

        return $score;
    }

    private function computeScoreFrom($annotation): int
    {
        $score = 0;
        if ($annotation instanceof TechnicalDebt) {
            foreach ($annotation->categories as $categoryName) {
                $score += $this->config->getCategory($categoryName)->getScore();
            }
        }

        return $score;
    }
}
