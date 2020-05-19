<?php

namespace Tiime\TechnicalDebtTracker;

final class TrackerConfig
{
    /** @var string[] */
    private $namespaces;

    /** @var Category[] */
    protected $categories;

    public function __construct(array $namespaces)
    {
        $this->namespaces = $namespaces;
        $this->categories = [];
    }

    public function getNamespaces(): array
    {
        return $this->namespaces;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function addCategory(Category ...$category): self
    {

        foreach ($category as $addingCategory) {
            if (false === isset($this->categories[$addingCategory->getName()])) {
                $this->categories[$addingCategory->getName()] = $addingCategory;
            }
        }

        return $this;
    }
}
