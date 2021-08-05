<?php

declare(strict_types=1);

namespace TDD;

class ValidationResult
{
    private bool $passes;
    private array $fails;

    public function __construct(bool $passes, array $fails)
    {
        $this->passes = $passes;
        $this->fails = $fails;
    }

    public function passes(): bool
    {
        return $this->passes;
    }

    public function getFails(): array
    {
        return $this->fails;
    }
}
