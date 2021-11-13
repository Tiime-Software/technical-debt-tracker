<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;
use HaydenPierce\ClassFinder\ClassFinder;
use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TokenIterator;
use PHPStan\PhpDocParser\Parser\TypeParser;
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

    public function getTechnicalDebtAnnotations(): \Generator
    {
        foreach ($this->getFqcns() as $fqcn) {
            $class = new \ReflectionClass($fqcn);


            $lexer = new Lexer();
            $constExprParser = new ConstExprParser();
            $phpDocParser = new PhpDocParser(new TypeParser($constExprParser), $constExprParser);

            if (!empty($class->getDocComment())) {
                $tokens = new TokenIterator($lexer->tokenize($class->getDocComment()));
                $actualPhpDocNode = $phpDocParser->parse($tokens);
                
                if (count($actualPhpDocNode->getTagsByName('@deprecated')) > 0) {
                    var_dump($actualPhpDocNode);
                }
            }

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
    
    public function getConfig(): TrackerConfig
    {
        return $this->config;
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
}
