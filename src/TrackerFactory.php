<?php

namespace Tiime\TechnicalDebtTracker;

use Doctrine\Common\Annotations\AnnotationReader;
use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TypeParser;

final class TrackerFactory
{
    public static function create($namespace, $category = []): Tracker
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

        $constExprParser = new ConstExprParser();
        
        return new Tracker(
            new TrackerConfig((array) $namespace, (array) $category), 
            new AnnotationReader(),
            new Lexer(),
            new PhpDocParser(new TypeParser($constExprParser), $constExprParser)
        );
    }
}
