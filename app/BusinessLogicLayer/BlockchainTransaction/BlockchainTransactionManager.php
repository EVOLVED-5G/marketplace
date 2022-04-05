<?php

namespace App\BusinessLogicLayer\BlockchainTransaction;

use App\Models\PurchasedNetapp;

interface BlockchainTransactionManager {

    public function createBlockchainTransactionForPurchasedNetapp(PurchasedNetapp $purchasedNetapp);

    public function createBlockchainTransactionAndGetResponse(string $additionalAdditionalData): string;

}
