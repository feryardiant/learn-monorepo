<?php

use LearnMonorepo\Bar\Dummy;
use LearnMonorepo\BarServiceProvider;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\setUp;

setUp(function ($super) {
    TestHelper::useProviders(BarServiceProvider::class);

    $super();
});

\it('should bound to dummy class', function () {
    \expect($this->app->bound(Dummy::class))->toBeTrue();
});
