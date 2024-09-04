<?php

use LearnMonorepo\Foo\Dummy;
use LearnMonorepo\FooServiceProvider;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\setUp;

setUp(function ($super) {
    TestHelper::useProviders(FooServiceProvider::class);

    $super();
});

\it('should bound to dummy class', function () {
    \expect($this->app->bound(Dummy::class))->toBeTrue();
});
