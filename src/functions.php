<?php declare(strict_types=1);

namespace iroegbu\WebPay;

function getURLs($environment): array
{
    $urls = [];
    if ($environment !== 'production') {
        $urls['payment']    = DEMO_PAYMENT;
        $urls['query']      = DEMO_QUERY;
    } else {
        $urls['payment']    = LIVE_PAYMENT;
        $urls['query']      = LIVE_QUERY;
    }
    return $urls;
}

function generatePaymentHash(string $transanctionReference, int $productId, int $paymentItemId, int $totalAmount, string $redirectUrl, string $hash): string
{
    $concat = $transanctionReference . $productId . $paymentItemId . $totalAmount . $redirectUrl . $hash;
    return hash('SHA512', $concat);
}

function generateRequeryHash(int $productId, string $transactionReference, string $hash): string
{
    $concat = $productId . $transactionReference . $hash;
    return hash('SHA512', $concat);
}
