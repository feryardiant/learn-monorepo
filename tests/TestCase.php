<?php

namespace LearnMonorepo\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Workbench\TestHelper;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use WithWorkbench;

    protected function getPackageProviders($app)
    {
        return TestHelper::providers();
    }
}
