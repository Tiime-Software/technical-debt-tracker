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

## 💯 Ranked categories
By default, this common categories are provided

| Category                       | Score   | Description                                  |
| :----------------------------- | :------ | :------------------------------------------- |
| hard to understand             | 200     |                                              |
| coupled                        | 150     |                                              |
| lack of test                   | 150     |                                              |
| delayed refactoring            | 50      | As the requirements for a project evolve, it may become clear that parts of the code have become inefficient or difficult to edit and must be refactored in order to support future requirements. The longer refactoring is delayed, and the more code is added, the bigger the debt. |
| lack of documentation          | 10      | where code is created without supporting documentation. The work to create documentation represents debt |
| lack of alignment to standards | 5       |                                              |
| core feature                   | 50      | Add penalty on applications's critical parts |
