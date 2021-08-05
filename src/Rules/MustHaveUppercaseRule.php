<?php

declare(strict_types=1);

namespace TDD\Rules;

use TDD\RuleMissingUppercaseException;

class MustHaveUppercaseRule implements ValidationRuleInterface
{
    public function validate(mixed $var): bool
    {
        if(!preg_match('/[A-Z]/', $var)) {
            return false;
        }
        return true;
    }
}
