<?php

return [

    'namespaces' => [],

    'categories' => [
        \Tiime\TechnicalDebtTracker\Category::securityIssue(),
        \Tiime\TechnicalDebtTracker\Category::hardToUnderstand(),
        \Tiime\TechnicalDebtTracker\Category::wip(),
        \Tiime\TechnicalDebtTracker\Category::criticalPart(),
        \Tiime\TechnicalDebtTracker\Category::bestPractice(),
    ]

];
