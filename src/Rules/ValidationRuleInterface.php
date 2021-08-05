<?php

declare(strict_types=1);

namespace TDD\Rules;

interface ValidationRuleInterface
{
    public function validate(mixed $var): void;
}
