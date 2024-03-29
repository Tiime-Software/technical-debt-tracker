<?php

namespace Tiime\TechnicalDebtTracker;

final class Category
{
    public const SECURITY_ISSUE = "security issue";
    public const HARD_TO_UNDERSTAND = "hard to understand";
    public const TIGHTLY_COUPLED = "tightly coupled";
    public const NEED_TESTS =  "need tests";
    public const DELAYED_REFACTORING = 'delayed refactoring';
    public const CORE_FEATURE  = "core feature";
    public const NEED_DOCUMENTATION = 'need documentation';
    public const BAD_PRACTICE = "bad practice";
    public const WIP = "Work in progress";

    /** @var string */
    private $name;

    /** @var int */
    private $score;

    public function __construct(string $name, int $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public static function securityIssue(): self
    {
        return new self(self::SECURITY_ISSUE, 500);
    }

    public static function hardToUnderstand(): self
    {
        return new self(self::HARD_TO_UNDERSTAND, 200);
    }

    public static function tightlyCoupled(): self
    {
        return new self(self::TIGHTLY_COUPLED, 150);
    }

    public static function needTests(): self
    {
        return new self(self::NEED_TESTS, 150);
    }

    public static function delayedRefactoring(): self
    {
        return new self(self::DELAYED_REFACTORING, 100);
    }

    public static function coreFeature(): self
    {
        return new self(self::CORE_FEATURE, 50);
    }

    public static function needDocumentation(): self
    {
        return new self(self::NEED_DOCUMENTATION, 10);
    }

    public static function badPractice(): self
    {
        return new self(self::BAD_PRACTICE, 5);
    }

    public static function wip(): self
    {
        return new self(self::WIP, 5);
    }
}
