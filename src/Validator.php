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

    public function verify(mixed $variable): array
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

        return [
            'passes' => $count > 3,
            'fails' => $fails,
        ];
    }
}
