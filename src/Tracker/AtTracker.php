<?php

namespace Tiime\TechnicalDebtTracker\Tracker;

use PHPStan\PhpDocParser\Ast\PhpDoc\DeprecatedTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\GenericTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode;
use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TokenIterator;
use Tiime\TechnicalDebtTracker\Annotation\TechnicalDebt;
use Tiime\TechnicalDebtTracker\ClassProvider;
use Tiime\TechnicalDebtTracker\TrackerInterface;

class AtTracker implements TrackerInterface
{
    /** @var ClassProvider */
    private $classProvider;

    /** @var Lexer */
    private $lexer;

    /** @var PhpDocParser */
    private $phpDocParser;

    /** @var string[] */
    private $tagNames;

    public function __construct(
        ClassProvider $classProvider,
        Lexer $lexer,
        PhpDocParser $phpDocParser,
        string ...$tagName
    ) {
        $this->classProvider = $classProvider;
        $this->lexer = $lexer;
        $this->phpDocParser = $phpDocParser;
        $this->tagNames = $tagName;
    }

    public function getTechnicalDebtAnnotations(): \Generator
    {
        foreach ($this->classProvider->getFqcns() as $fqcn) {
            $class = new \ReflectionClass($fqcn);

            if (!empty($class->getDocComment())) {
                foreach ($this->getTagNodes($class->getDocComment()) as $tag) {

                    $debt = new TechnicalDebt();

                    switch (true) {
                        case $tag->value instanceof GenericTagValueNode:
                            $debt->description = $tag->value->value;
                            break;
                        case $tag->value instanceof DeprecatedTagValueNode:
                            $debt->description = $tag->value->description;
                            break;
                    }

                    yield $debt;
                }
            }
        }
    }

    /** @return \Generator<PhpDocTagNode> */
    private function getTagNodes(string $docComment): \Generator
    {
        $actualPhpDocNode = $this->phpDocParser->parse(new TokenIterator($this->lexer->tokenize($docComment)));

        foreach ($this->tagNames as $tagName) {
            foreach ($actualPhpDocNode->getTagsByName($tagName) as $tag) {
                yield $tag;
            }
        }
    }
}
