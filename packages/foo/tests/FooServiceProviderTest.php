<?php

use LearnMonorepo\Foo\Dummy;
use LearnMonorepo\FooServiceProvider;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\afterApplicationCreated;

afterApplicationCreated(function () {
    TestHelper::useProviders(FooServiceProvider::class);
});

\it('should bound to dummy class', function () {
    \expect(app()->bound(Dummy::class))->toBeTrue();
});
