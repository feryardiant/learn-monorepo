<?php

namespace LearnMonorepo\Tests;

use LearnMonorepo\BarServiceProvider;
use PHPUnit\Framework\Attributes\Test;

class BarServiceProviderTest extends TestCase
{
    #[Test]
    public function it_should_be_true()
    {
        $this->assertTrue(\class_exists(BarServiceProvider::class));
    }
}
