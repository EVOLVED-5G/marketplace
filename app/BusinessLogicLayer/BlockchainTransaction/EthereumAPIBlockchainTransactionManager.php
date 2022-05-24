<?php

namespace App\BusinessLogicLayer\BlockchainTransaction;

use App\Models\PurchasedNetApp;
use App\Notifications\NotifyBuyerAboutPurchasedNetappBlockchainTransactionCreation;
use App\Repository\PurchasedNetAppRepository;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class EthereumAPIBlockchainTransactionManager implements BlockchainTransactionManager
{

    private $CRYPTO_SENDER_ADDRESS;
    private $CRYPTO_RECEIVER_ADDRESS;
    private $CRYPTO_WALLET_PRIVATE_KEY;
    private $CRYPTO_NETWORK;
    private $CRYPTO_INFURA_PROJECT_ID;
    private $CRYPTO_SENDER_BASE_URL;
    protected $purchasedNetappRepository;
    protected $client;

    public function __construct(PurchasedNetAppRepository $purchasedNetappRepository) {
        $this->CRYPTO_SENDER_ADDRESS = config('app.crypto_sender_address');
        $this->CRYPTO_RECEIVER_ADDRESS = config('app.crypto_receiver_address');
        $this->CRYPTO_WALLET_PRIVATE_KEY = config('app.crypto_wallet_private_key');
        $this->CRYPTO_NETWORK = config('app.crypto_network');
        $this->CRYPTO_INFURA_PROJECT_ID = config('app.crypto_infura_project_id');
        $this->CRYPTO_SENDER_BASE_URL = config('app.crypto_transaction_sender_base_url');
        $this->purchasedNetappRepository = $purchasedNetappRepository;
        $this->client = new Client();
    }

    /**
     * @throws Exception if the blockchain transaction cannot be created
     */
    public function createBlockchainTransactionForPurchasedNetapp(PurchasedNetApp $purchasedNetapp) {
        $response = $this->createBlockchainTransactionAndGetResponse($purchasedNetapp->hash);
        $response = json_decode($response);
        $this->purchasedNetappRepository->update([
            'blockchain_transaction_url' => filter_var($response->link, FILTER_SANITIZE_URL)
        ], $purchasedNetapp->id);
        $buyerUser = $purchasedNetapp->user;
        $buyerUser->notify(new NotifyBuyerAboutPurchasedNetappBlockchainTransactionCreation($purchasedNetapp));
    }

    /**
     * @param string $data
     * @return string the response
     * @throws Exception
     */
    public function createBlockchainTransactionAndGetResponse(string $data): string {
        $this->validateEnvironment();
        return $this->client->request('POST', $this->CRYPTO_SENDER_BASE_URL . 'create', [
            'json' => [
                'network' => $this->CRYPTO_NETWORK,
                'project' => $this->CRYPTO_INFURA_PROJECT_ID,
                'from' => $this->CRYPTO_SENDER_ADDRESS,
                'to' => $this->CRYPTO_RECEIVER_ADDRESS,
                'key' => $this->CRYPTO_WALLET_PRIVATE_KEY,
                'data' => $data
            ],
            // If you want more informations during request
            'debug' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ])->getBody();
    }

    /**
     * @throws Exception
     */
    protected function validateEnvironment() {
        if (!$this->CRYPTO_SENDER_BASE_URL)
            throw new Exception("Crypto Sender base URL is null");
        if (!$this->CRYPTO_SENDER_ADDRESS)
            throw new Exception("Crypto Sender address is null");
        if (!$this->CRYPTO_RECEIVER_ADDRESS)
            throw new Exception("Crypto Receiver address is null");
        if (!$this->CRYPTO_WALLET_PRIVATE_KEY)
            throw new Exception("Crypto Wallet private Key is null");
        if (!$this->CRYPTO_NETWORK)
            throw new Exception("Crypto Network is null");
        if (!$this->CRYPTO_INFURA_PROJECT_ID)
            throw new Exception("Crypto Infura Project ID is null");
    }

    public function isBlockchainIntegrationEnabled(): bool {
        return $this->CRYPTO_SENDER_BASE_URL !== null
            && strpos($this->CRYPTO_SENDER_BASE_URL, "http") !== FALSE;
    }

}
