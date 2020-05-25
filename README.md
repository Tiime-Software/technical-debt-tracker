# Technical debt tracker

> As with monetary debt, if technical debt is not repaid, it can accumulate 'interest', making it harder to implement changes.

## 🐿️ In a nutshell
Use PHP annotations _(docblocks annotations)_ to monitor your technical debt.
```php
/**
  * @TechnicalDebt(
  *     categories={"coupled", "Lack of test"}, 
  *     reporter="Flavien Rodrigues", 
  *     description="Lorem ipsum sit dolor amet"
  * )
  */
class DummyService
{
    // ...
}
```
Then run our script as CI step and record the result into your monitoring tool.
```
vendor/bin/technical-debt-tracker
```

## 🪜 Ranked categories
Tightly-coupled components, where functions are not modular, the software is not flexible enough to adapt to changes in business needs.
Lack of a test suite, which encourages quick and risky band-aid bug fixes.
Lack of documentation, where code is created without supporting documentation. The work to create documentation represents debt.
Delayed refactoring – As the requirements for a project evolve, it may become clear that parts of the code have become inefficient or difficult to edit and must be refactored in order to support future requirements. The longer refactoring is delayed, and the more code is added, the bigger the debt.[7]:29
Lack of alignment to standards, where industry standard features, frameworks, technologies are ignored. Eventually integration with standards will come, and doing so sooner will cost less (similar to 'delayed refactoring').
Lack of knowledge, when the developer doesn't know how to write elegant code.
