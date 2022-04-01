<?php

namespace Tests\Unit;

use App\BusinessLogicLayer\CryptoTransaction\EthereumAPICryptoTransactionManager;
use Illuminate\Contracts\Container\BindingResolutionException;
use Tests\CreatesApplication;
use Tests\TestCase;

class CryptoTransactionTests extends TestCase {
    use CreatesApplication;

    public function setUp(): void {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function test_crypto_transaction() {
        $cryptoTransactionManager = app()->make(EthereumAPICryptoTransactionManager::class);
        $response = json_decode($cryptoTransactionManager->createTransactionAndGetResponse());
        $link = $response->link;
        $link = filter_var($link, FILTER_SANITIZE_URL);
        echo "\n" . $link . "\n";
        self::assertTrue(filter_var($link, FILTER_VALIDATE_URL) !== false);
    }
}
