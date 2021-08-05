<?php

declare(strict_types=1);

namespace TDD\Rules;

use TDD\RuleMissingLowercaseException;
use TDD\RuleMissingNumberException;
use TDD\RuleMissingUppercaseException;

class MustHaveNumberRule implements ValidationRuleInterface
{
    public function validate(mixed $var): void
    {
        if(!preg_match('/\d/', $var)) {
            throw new RuleMissingNumberException();
        }
    }
}
