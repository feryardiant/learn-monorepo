<?php

namespace LearnMonorepo\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;

class DuskTestCase extends \Orchestra\Testbench\Dusk\TestCase
{
    use WithTestHelper;
    use WithWorkbench;
}
