<?php

declare(strict_types=1);

namespace TDD;

use TDD\Rules\ValidationRuleInterface;

class Validator
{
    /**
     * @var ValidationRuleInterface[]
     */
    private array $rules;
    private int $shouldSatisfyAtLeastNumberOfRules;

    /**
     * @param ValidationRuleInterface[] $rules
     */
    public function __construct(int $shouldSatisfyAtLeastNumberOfRules, ValidationRuleInterface ...$rules)
    {
        $this->rules = $rules;
        $this->shouldSatisfyAtLeastNumberOfRules = $shouldSatisfyAtLeastNumberOfRules;
    }

    public function verify(mixed $variable): ValidationResult
    {
        $count = 0;
        $fails = [];
        foreach ($this->rules as $rule) {
            if ($rule->validate($variable)) {
                $count++;
            } else {
                $fails[] = get_class($rule);
            }
        }

        return new ValidationResult($count > $this->shouldSatisfyAtLeastNumberOfRules, $fails);
    }
}
