<?php declare(strict_types=1);

namespace iroegbu\WebPay;

class Credentials
{
    private $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}
