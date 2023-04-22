<?php

declare(strict_types=1);

include_once __DIR__ . '/stubs/Validator.php';

class LibraryTest extends TestCaseSymconValidation
{
    public function testValidateLibrary(): void
    {
        $this->validateLibrary(__DIR__ . '/..');
    }

    public function testValidateELROSwitchDIP(): void
    {
        $this->validateModule(__DIR__ . '/../ELROSwitchDIP');
    }
    public function testValidateELROSwitchGen(): void
    {
        $this->validateModule(__DIR__ . '/../ELROSwitchGen');
    }
    public function testValidateELROSwitchRS(): void
    {
        $this->validateModule(__DIR__ . '/../ELROSwitchRS');
    }
    public function testValidateELROSwitchRS2(): void
    {
        $this->validateModule(__DIR__ . '/../ELROSwitchRS2');
    }
    public function testValidateELROSwitchRS3(): void
    {
        $this->validateModule(__DIR__ . '/../ELROSwitchRS3');
    }
}