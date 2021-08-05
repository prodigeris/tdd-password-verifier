<?php

declare(strict_types=1);

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use TDD\RuleEmptyException;
use TDD\RuleMissingLowercaseException;
use TDD\RuleMissingNumberException;
use TDD\RuleMissingUppercaseException;
use TDD\RuleTooShortException;
use TDD\PasswordValidator;
use TDD\Rules\EmptyRule;
use TDD\Rules\MinLength;
use TDD\Rules\MustHaveLowercaseRule;
use TDD\Rules\MustHaveNumberRule;
use TDD\Rules\MustHaveUppercaseRule;

class PasswordVerifierTest extends TestCase
{
    private const SHORT_PASSWORD = 'abcdefg';

    private const VALID_PASSWORD = 'abcd2fGh';

    private const PASSWORD_MISSING_UPPERCASE = 'abcdefghi';

    private const PASSWORD_MISSING_LOWERCASE = 'ABCDEFGH';

    private const PASSWORD_MISSING_NUMBER = 'ABCDeFGH';

    private const EMPTY_PASSWORD = '';

    private PasswordValidator $passwordVerifier;

    public function setUp(): void
    {
        $this->passwordVerifier = new PasswordValidator();
    }

    public function test_password_should_throw_exception_when_password_is_shorter_than_8_characters(): void
    {
        $this->expectException(RuleTooShortException::class);
        $this->passwordVerifier->verify(self::SHORT_PASSWORD);
    }

    public function test_password_should_not_throw_any_exception_when_password_is_valid(): void
    {
        $this->passwordVerifier->verify(self::VALID_PASSWORD);

        $this->assertTrue(true);
    }

    public function test_password_should_throw_exception_when_password_is_empty(): void
    {
        $this->expectException(RuleEmptyException::class);
        $this->passwordVerifier->verify(self::EMPTY_PASSWORD);
    }

    public function test_password_should_throw_exception_when_password_doesnt_have_uppercase_letter(): void
    {
        $this->expectException(RuleMissingUppercaseException::class);
        $this->passwordVerifier->verify(self::PASSWORD_MISSING_UPPERCASE);
    }

    public function test_password_should_throw_exception_when_password_doesnt_have_lowercase_letter(): void
    {
        $this->expectException(RuleMissingLowercaseException::class);
        $this->passwordVerifier->verify(self::PASSWORD_MISSING_LOWERCASE);
    }

    public function test_password_should_throw_exception_when_password_doesnt_have_number(): void
    {
        $this->expectException(RuleMissingNumberException::class);
        $this->passwordVerifier->verify(self::PASSWORD_MISSING_NUMBER);
    }
}
