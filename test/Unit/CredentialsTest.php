<?php

namespace Test\Unit\Credentials;

use iroegbu\WebPay\Credentials;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function testExistence()
    {
        $credentials = new Credentials('hash');
        $this->assertSame('hash', $credentials->getHash());
    }
}
