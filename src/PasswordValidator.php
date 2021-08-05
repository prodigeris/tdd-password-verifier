<?php

declare(strict_types=1);

namespace TDD;

use TDD\Rules\EmptyRule;
use TDD\Rules\MinLength;
use TDD\Rules\MustHaveLowercaseRule;
use TDD\Rules\MustHaveNumberRule;
use TDD\Rules\MustHaveUppercaseRule;

class PasswordValidator extends Validator
{
    public function __construct()
    {
        parent::__construct(
            new EmptyRule(),
            new MinLength(8),
            new MustHaveUppercaseRule(),
            new MustHaveLowercaseRule(),
            new MustHaveNumberRule(),
        );
    }
}
