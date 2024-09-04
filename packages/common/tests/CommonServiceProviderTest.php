<?php

namespace LearnMonorepo\Tests;

use LearnMonorepo\CommonServiceProvider;
use PHPUnit\Framework\Attributes\Test;

class CommonServiceProviderTest extends TestCase
{
    #[Test]
    public function it_should_be_true()
    {
        $this->assertTrue(\class_exists(CommonServiceProvider::class));
    }
}
