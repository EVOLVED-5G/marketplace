<?php

namespace App\Jobs;

use App\BusinessLogicLayer\BlockchainTransaction\EthereumAPIBlockchainTransactionManager;
use App\Models\PurchasedNetapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateBlockchainTransactionForPurchasedNetapp implements ShouldQueue, ShouldBeUnique {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $purchasedNetapp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PurchasedNetapp $purchasedNetapp) {
        $this->onQueue('blockchain-transactions');
        $this->purchasedNetapp = $purchasedNetapp;
    }

    public function uniqueId() {
        return $this->purchasedNetapp->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EthereumAPIBlockchainTransactionManager $blockchainTransactionManager) {
        $blockchainTransactionManager->createBlockchainTransactionForPurchasedNetapp($this->purchasedNetapp);
    }
}
