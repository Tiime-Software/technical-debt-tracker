<?php

namespace Tiime\TechnicalDebtTracker;

final class Category
{
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
}
