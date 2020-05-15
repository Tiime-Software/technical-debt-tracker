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
            $classAnnotation = $this->reader->getClassAnnotation($class, TechnicalDebt::class);

            if ($classAnnotation instanceof TechnicalDebt) {
                ++$score;
            }

            $methods = $class->getMethods();

            foreach ($methods as $method) {
                $methodAnnotation = $this->reader->getMethodAnnotation($method, TechnicalDebt::class);

                if ($methodAnnotation instanceof TechnicalDebt) {
                    ++$score;
                }
            }

            $properties = $class->getProperties();

            foreach ($properties as $property) {
                $propertyAnnotation = $this->reader->getPropertyAnnotation($property, TechnicalDebt::class);

                if ($propertyAnnotation instanceof TechnicalDebt) {
                    ++$score;
                }
            }
        }

        return $score;
    }
}