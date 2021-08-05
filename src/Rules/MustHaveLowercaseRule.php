<?php

declare(strict_types=1);

namespace TDD\Rules;

use TDD\RuleMissingLowercaseException;

class MustHaveLowercaseRule implements ValidationRuleInterface
{
    public function validate(mixed $var): bool
    {
        if(!preg_match('/[a-z]/', $var)) {
            return false;
        }
        return true;
    }
}
