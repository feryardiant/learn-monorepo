<?php

namespace LearnMonorepo\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\Dusk\TestCase;
use Workbench\TestHelper;

class DuskTestCase extends TestCase
{
    use WithWorkbench;

    protected function getPackageProviders($app)
    {
        return TestHelper::providers();
    }
}
