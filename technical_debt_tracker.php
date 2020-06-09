<?php

return [

    'namespaces' => [],

    'categories' => [
        \Tiime\TechnicalDebtTracker\Category::securityIssue(),
        \Tiime\TechnicalDebtTracker\Category::hardToUnderstand(),
        \Tiime\TechnicalDebtTracker\Category::tightlyCoupled(),
        \Tiime\TechnicalDebtTracker\Category::needTests(),
        \Tiime\TechnicalDebtTracker\Category::delayedRefactoring(),
        \Tiime\TechnicalDebtTracker\Category::coreFeature(),
        \Tiime\TechnicalDebtTracker\Category::needDocumentation(),
        \Tiime\TechnicalDebtTracker\Category::badPractice(),
        \Tiime\TechnicalDebtTracker\Category::wip(),
    ]

];
