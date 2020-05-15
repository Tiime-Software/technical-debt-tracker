<?php

namespace Tiime\TechnicalDebtTracker;

final class TrackerConfig
{
    /** @var string[] */
    private $namespaces;

    public function __construct(array $namespaces)
    {
        $this->namespaces = $namespaces;
    }

    public function getNamespaces(): array
    {
        return $this->namespaces;
    }
}