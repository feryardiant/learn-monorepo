<?php

use LearnMonorepo\Common\Dummy;
use LearnMonorepo\CommonServiceProvider;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\afterApplicationCreated;

afterApplicationCreated(function () {
    TestHelper::useProviders(CommonServiceProvider::class);
});

\it('should bound to dummy class', function () {
    \expect(app()->bound(Dummy::class))->toBeTrue();
});
