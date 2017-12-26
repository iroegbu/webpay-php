<?php declare(strict_types=1);

namespace iroegbu\WebPay;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;

class Client
{
    private $credentials;
    private $environment;

    public function __construct(Credentials $credentials, string $environment = 'development')
    {
        $this->credentials = $credentials;
        $this->environment = $environment;
    }

    public function requery(string $transactionReference, int $productId, int $amount): Response
    {
        $urls = getURLs($this->environment);
        $hash = generateRequeryHash($productId, $transactionReference, $this->credentials->getHash());

        $guzzle = new Guzzle();
        $response = $guzzle->request(
            'GET',
            $urls['query'],
            [
                'query' => ['productid' => $productId, 'transactionreference' => $transactionReference, 'amount' => $amount],
                'headers' => ['User-Agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; MS Web Services Client Protocol 4.0.30319.239)', 'Hash' => $hash]
            ]
        );
        return $response;
    }
}
