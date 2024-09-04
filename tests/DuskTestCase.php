<?php

namespace LearnMonorepo\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;
use Workbench\TestHelper;

class DuskTestCase extends \Orchestra\Testbench\Dusk\TestCase
{
    use WithWorkbench;

    protected function getPackageProviders($app)
    {
        return TestHelper::providers();
    }
}
