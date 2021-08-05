<?php

declare(strict_types=1);

namespace TDD\Rules;

use TDD\RuleMissingLowercaseException;

class MustHaveLowercaseRule implements ValidationRuleInterface
{
    public function validate(mixed $var): void
    {
        if(!preg_match('/[a-z]/', $var)) {
            throw new RuleMissingLowercaseException();
        }
    }
}
