<?php

declare(strict_types=1);

namespace TDD\Rules;

use TDD\RuleMissingLowercaseException;
use TDD\RuleMissingNumberException;
use TDD\RuleMissingUppercaseException;
use TDD\RuleTooShortException;

class MinLength implements ValidationRuleInterface
{
    private int $minLength;

    public function __construct(int $minLength)
    {
        $this->minLength = $minLength;
    }

    public function validate(mixed $var): void
    {
        if(strlen($var) < $this->minLength) {
            throw new RuleTooShortException();
        }
    }
}
