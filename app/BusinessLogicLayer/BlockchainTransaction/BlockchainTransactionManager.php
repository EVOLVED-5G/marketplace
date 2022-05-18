<?php

namespace App\BusinessLogicLayer\BlockchainTransaction;

use App\Models\PurchasedNetApp;

interface BlockchainTransactionManager {

    public function createBlockchainTransactionForPurchasedNetapp(PurchasedNetApp $purchasedNetapp);

    public function createBlockchainTransactionAndGetResponse(string $data): string;

}
