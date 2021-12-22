<?php

namespace Tiime\TechnicalDebtTracker\Tracker;

use Doctrine\Common\Annotations\AnnotationReader;
use PHPStan\PhpDocParser\Parser\TokenIterator;
use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\ClassProvider;
use Tiime\TechnicalDebtTracker\TrackerInterface;

class AnnotationTracker implements TrackerInterface
{
    /** @var ClassProvider */
    private $classProvider;

    /** @var AnnotationReader */
    private $reader;

    public function __construct(ClassProvider $classProvider, AnnotationReader $reader)
    {
        $this->classProvider = $classProvider;
        $this->reader = $reader;
    }

    public function getTechnicalDebtAnnotations(): \Generator
    {
        foreach ($this->classProvider->getFqcns() as $fqcn) {
            $class = new \ReflectionClass($fqcn);

            foreach ($this->reader->getClassAnnotations($class) as $annotation) {
                yield $annotation;
            }

            $methods = $class->getMethods();
            foreach ($methods as $method) {
                foreach ($this->reader->getMethodAnnotations($method) as $annotation) {
                    yield $annotation;
                }
            }

            $properties = $class->getProperties();
            foreach ($properties as $property) {
                foreach ($this->reader->getPropertyAnnotations($property) as $annotation) {
                    yield $annotation;
                }
            }
        }
    }
}
