<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;
use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TypeParser;
use Tiime\TechnicalDebtTracker\Tracker\AnnotationTracker;
use Tiime\TechnicalDebtTracker\Tracker\AtTracker;

final class TrackerFactory
{
    /** @param string|string[] $namespace */
    public static function create($namespace, array $category = []): Tracker
    {
        if (true === empty($category)) {
            $category = [
                Category::securityIssue(),
                Category::hardToUnderstand(),
                Category::coreFeature(),
                Category::needDocumentation(),
                Category::delayedRefactoring(),
                Category::wip(),
                Category::tightlyCoupled(),
                Category::needTests(),
                Category::badPractice()
            ];
        }

        $config = new TrackerConfig((array) $namespace, $category, Category::delayedRefactoring()->getScore());

        $constExprParser = new ConstExprParser();
        $lexer = new Lexer();
        $phpDocParser = new PhpDocParser(new TypeParser($constExprParser), $constExprParser);

        $classProvider = new ClassProvider($config);

        return new Tracker(
            $config,
            new AnnotationTracker($classProvider, new AnnotationReader()),
            new AtTracker($classProvider, $lexer, $phpDocParser, '@deprecated', '@todo')
        );
    }
}
