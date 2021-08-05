<?php

declare(strict_types=1);

namespace TDD\Rules;

use TDD\RuleEmptyException;

class EmptyRule implements ValidationRuleInterface
{
    public function validate(mixed $var): bool
    {
        if(!$var) {
            return false;
        }
        return true;
    }
}
