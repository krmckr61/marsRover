<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function getInvalidTypeOfParamMessage(string $expectedParamType, string $actualParamType): string {
        return '/must be of type ' . $expectedParamType . ', ' . $actualParamType . ' given/';
    }

}
