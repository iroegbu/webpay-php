<?php

namespace Test\Unit\Credentials;

use iroegbu\WebPay\Credentials;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    private function createCredentials()
    {
        return new Credentials('hash');
    }

    public function testExistence()
    {
        $credentials = $this->createCredentials();
        $this->assertInstanceOf('iroegbu\WebPay\Credentials', $credentials);
    }

    public function testHash()
    {
        $credentials = $this->createCredentials();
        $this->assertSame('hash', $credentials->getHash());
    }
}
