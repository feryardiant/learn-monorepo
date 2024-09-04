<?php

namespace LearnMonorepo\Tests;

use Workbench\TestHelper;

trait WithTestHelper
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->beforeApplicationDestroyed(function () {
            TestHelper::clearProviders();
        });
    }

    protected function getPackageProviders($app)
    {
        return TestHelper::providers();
    }
}
