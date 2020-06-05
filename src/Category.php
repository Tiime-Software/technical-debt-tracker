<?php

namespace Tiime\TechnicalDebtTracker;

final class Category
{
    const SECURITY_ISSUE = "High security issue";
    const HARD_TO_UNDERSTAND = "I don't understand easily what happens";
    const CRITICAL_PART = "Critical part of the application";
    const BEST_PRACTICE = "Not following best practice";
    const WIP = "Work in progress";

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
        return new self(self::HARD_TO_UNDERSTAND, 20);
    }

    public static function wip(): self
    {
        return new self(self::WIP, 10);
    }

    public static function criticalPart(): self
    {
        return new self(self::CRITICAL_PART, 5);
    }

    public static function bestPractice(): self
    {
        return new self(self::BEST_PRACTICE, 2);
    }
}
