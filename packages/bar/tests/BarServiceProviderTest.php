<?php

use LearnMonorepo\Bar\Dummy;
use LearnMonorepo\BarServiceProvider;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\afterApplicationCreated;

afterApplicationCreated(function () {
    TestHelper::useProviders(BarServiceProvider::class);
});

\it('should bound to dummy class', function () {
    \expect(app()->bound(Dummy::class))->toBeTrue();
});

\it('shoud has correct instance', function () {
    \expect(app()->get(Dummy::class))->toBeInstanceOf(Dummy::class);
});
