<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use LearnMonorepo\Tests\DuskTestCase;
use LearnMonorepo\Tests\TestCase;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\beforeApplicationDestroyed;

\uses(DuskTestCase::class)->in('Browser', '../packages/*/tests/Browser');
\uses(TestCase::class)->in('Feature', 'Unit', '../packages/*/tests');

beforeApplicationDestroyed(function () {
    TestHelper::clearProviders();
});
