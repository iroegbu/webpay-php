<?php

namespace Test\Unit\Credentials;

use iroegbu\WebPay\Client;
use iroegbu\WebPay\Credentials;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function createClient()
    {
        return new Client(new Credentials('hashkey'), 'development');
    }

    /**
     * @covers iroegbu\WebPay\Client::__construct
     */
    public function testImplementsCorrectInterface()
    {
        $client = $this->createClient();
        $this->assertInstanceOf('iroegbu\WebPay\Client', $client);
    }
}
