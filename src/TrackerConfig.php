<?php

namespace Tiime\TechnicalDebtTracker;

final class TrackerConfig
{
    /** @var string[] */
    private $namespaces;

    /** @var Category[] */
    protected $categories;

    /** @var int */
    protected $defaultDebtWeight;

    public function __construct(array $namespaces, array $categories, int $defaultDebtWeight)
    {
        $this->namespaces = $namespaces;
        $this->categories = [];
        $this->defaultDebtWeight = $defaultDebtWeight;

        foreach ($categories as $category) {
            $this->addCategory($category);
        }
    }

    public function getNamespaces(): array
    {
        return $this->namespaces;
    }

    public function getCategory(string $name): Category
    {
        if (false === isset($this->categories[$name])) {
            throw new \LogicException("unknown category named '$name'");
        }

        return $this->categories[$name];
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

    public function getDefaultDebtWeight(): int
    {
        return $this->defaultDebtWeight;
    }
}
