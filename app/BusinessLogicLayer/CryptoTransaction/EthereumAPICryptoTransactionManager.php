<?php

namespace App\BusinessLogicLayer\CryptoTransaction;

use Exception;

class EthereumAPICryptoTransactionManager implements CryptoTransactionManager {

    private $CRYPTO_SENDER_ADDRESS;
    private $CRYPTO_RECEIVER_ADDRESS;
    private $CRYPTO_WALLET_PRIVATE_KEY;
    private $CRYPTO_NETWORK;
    private $CRYPTO_INFURA_PROJECT_ID;
    private $CRYPTO_TRANSACTION_SENDER_PATH;

    public function __construct() {
        $this->CRYPTO_SENDER_ADDRESS = config('app.crypto_sender_address');
        $this->CRYPTO_RECEIVER_ADDRESS = config('app.crypto_receiver_address');
        $this->CRYPTO_WALLET_PRIVATE_KEY = config('app.crypto_wallet_private_key');
        $this->CRYPTO_NETWORK = config('app.crypto_network');
        $this->CRYPTO_INFURA_PROJECT_ID = config('app.crypto_infura_project_id');
        $this->CRYPTO_TRANSACTION_SENDER_PATH = config('app.crypto_transaction_sender_path');
    }

    public function createTransactionForUser(int $user_id, int $net_app_id) {

    }

    /**
     * @throws Exception
     */
    public function createTransactionAndGetResponse(): string {
        $this->validateEnvironment();
        $command = 'node ' . $this->CRYPTO_TRANSACTION_SENDER_PATH
            . ' --network=' . $this->CRYPTO_NETWORK
            . ' --project=' . $this->CRYPTO_INFURA_PROJECT_ID
            . ' --from=' . $this->CRYPTO_SENDER_ADDRESS
            . ' --to=' . $this->CRYPTO_RECEIVER_ADDRESS
            . ' --key=' . $this->CRYPTO_WALLET_PRIVATE_KEY
            . ' --data=' . '"EVOLVED-5G Transaction"';
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
        if (!file_exists($this->CRYPTO_TRANSACTION_SENDER_PATH))
            throw new Exception("Transaction Sender utility not found . Queried path: " . $this->CRYPTO_TRANSACTION_SENDER_PATH);
    }
}
