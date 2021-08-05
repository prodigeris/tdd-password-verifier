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

    /**
     * @param ValidationRuleInterface[] $rules
     */
    public function __construct(ValidationRuleInterface ...$rules)
    {
        $this->rules = $rules;
    }

    public function verify(mixed $variable): void
    {
        foreach($this->rules as $rule) {
            $rule->validate($variable);
        }
    }
}
