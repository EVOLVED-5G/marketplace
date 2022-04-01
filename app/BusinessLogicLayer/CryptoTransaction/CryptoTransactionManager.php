<?php

namespace App\BusinessLogicLayer\CryptoTransaction;

interface CryptoTransactionManager {

    public function createTransactionForUser(int $user_id, int $net_app_id);

    public function createTransactionAndGetResponse(): string;

}
