<?php

use LearnMonorepo\Common\Dummy;
use LearnMonorepo\CommonServiceProvider;
use Workbench\TestHelper;

use function Orchestra\Testbench\Pest\setUp;

setUp(function ($super) {
    TestHelper::useProviders(CommonServiceProvider::class);

    $super();
});

\it('should bound to dummy class', function () {
    \expect($this->app->bound(Dummy::class))->toBeTrue();
});
