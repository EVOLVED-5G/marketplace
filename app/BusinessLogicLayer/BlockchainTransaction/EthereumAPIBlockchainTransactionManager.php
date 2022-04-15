<?php

namespace App\BusinessLogicLayer\BlockchainTransaction;

use App\Models\PurchasedNetApp;
use App\Notifications\NotifyBuyerAboutPurchasedNetappBlockchainTransactionCreation;
use App\Repository\PurchasedNetAppRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class EthereumAPIBlockchainTransactionManager implements BlockchainTransactionManager {

    private $CRYPTO_SENDER_ADDRESS;
    private $CRYPTO_RECEIVER_ADDRESS;
    private $CRYPTO_WALLET_PRIVATE_KEY;
    private $CRYPTO_NETWORK;
    private $CRYPTO_INFURA_PROJECT_ID;
    private $CRYPTO_TRANSACTION_SENDER_PATH;
    private $NODEJS_PATH;
    protected $purchasedNetappRepository;

    public function __construct(PurchasedNetAppRepository $purchasedNetappRepository) {
        $this->CRYPTO_SENDER_ADDRESS = config('app.crypto_sender_address');
        $this->CRYPTO_RECEIVER_ADDRESS = config('app.crypto_receiver_address');
        $this->CRYPTO_WALLET_PRIVATE_KEY = config('app.crypto_wallet_private_key');
        $this->CRYPTO_NETWORK = config('app.crypto_network');
        $this->CRYPTO_INFURA_PROJECT_ID = config('app.crypto_infura_project_id');
        $this->CRYPTO_TRANSACTION_SENDER_PATH = config('app.crypto_transaction_sender_path');
        $this->NODEJS_PATH = config('app.nodejs_path');
        $this->purchasedNetappRepository = $purchasedNetappRepository;
    }

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
     * @param string $additionalData
     * @return string the response
     * @throws Exception
     */
    public function createBlockchainTransactionAndGetResponse(string $additionalData): string {
        $this->validateEnvironment();
        $command = $this->NODEJS_PATH . ' ' . $this->CRYPTO_TRANSACTION_SENDER_PATH
            . ' --network=' . $this->CRYPTO_NETWORK
            . ' --project=' . $this->CRYPTO_INFURA_PROJECT_ID
            . ' --from=' . $this->CRYPTO_SENDER_ADDRESS
            . ' --to=' . $this->CRYPTO_RECEIVER_ADDRESS
            . ' --key=' . $this->CRYPTO_WALLET_PRIVATE_KEY
            . ' --data=' . '"' . $additionalData . '"';
        return trim(shell_exec($command));
    }

    /**
     * @throws Exception
     */
    protected function validateEnvironment() {
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
        if (!$this->NODEJS_PATH)
            throw new Exception("NodeJS path is null");
        if (!file_exists($this->CRYPTO_TRANSACTION_SENDER_PATH))
            throw new Exception("Transaction Sender utility not found . Queried path: " . $this->CRYPTO_TRANSACTION_SENDER_PATH);
    }
}
