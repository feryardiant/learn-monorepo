<?php

namespace LearnMonorepo\Tests;

use LearnMonorepo\FooServiceProvider;
use PHPUnit\Framework\Attributes\Test;

class FooServiceProviderTest extends TestCase
{
    #[Test]
    public function it_should_be_true()
    {
        $this->assertTrue(\class_exists(FooServiceProvider::class));
    }
}
