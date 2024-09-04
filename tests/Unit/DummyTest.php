<?php

use LearnMonorepo\Bar\Dummy as DummyBar;
use LearnMonorepo\Common\Dummy as DummyCommon;
use LearnMonorepo\Foo\Dummy as DummyFoo;

it('should has dummy foo', function () {
    expect(DummyFoo::class)->toBeClass();
});

it('should has dummy bar', function () {
    expect(DummyBar::class)->toBeClass();
});

it('should has dummy common', function () {
    expect(DummyCommon::class)->toBeClass();
});
