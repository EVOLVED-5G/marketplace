<?php


namespace App\BusinessLogicLayer\PurchasedNetapp;

use App\BusinessLogicLayer\BlockchainTransaction\BlockchainTransactionManager;
use App\Jobs\CreateBlockchainTransactionForPurchasedNetApp;
use App\Models\PurchasedNetApp;
use App\Notifications\NotifyBuyerAboutPurchasedNetApp;
use App\Notifications\NotifySellerAboutPurchasedNetApp;
use App\Repository\PurchasedNetAppRepository;
use Illuminate\Support\Collection;

class PurchasedNetAppManager {

    protected $purchasedNetAppRepository;
    protected $blockchainTransactionManager;

    public function __construct(PurchasedNetAppRepository    $purchasedNetAppRepository,
                                BlockchainTransactionManager $blockchainTransactionManager) {
        $this->purchasedNetAppRepository = $purchasedNetAppRepository;
        $this->blockchainTransactionManager = $blockchainTransactionManager;
    }

    /**
     * Creates a @PurchasedNetapp record and disseminates the different
     * business logic jobs related to it.
     *
     * @param array $requestData array with the form data
     * @return PurchasedNetApp the newly created purchase record
     */
    public function create(array $requestData): PurchasedNetApp {
        $purchasedNetapp = $this->purchasedNetAppRepository->create($requestData);
        $hash = $this->getHashForPurchasedNetApp($purchasedNetapp);
        $this->purchasedNetAppRepository->update([
            'hash' => $hash
        ], $purchasedNetapp->id);
        if ($this->blockchainTransactionManager->isBlockchainIntegrationEnabled())
            CreateBlockchainTransactionForPurchasedNetApp::dispatch($purchasedNetapp);
        $sellerUser = $purchasedNetapp->netapp->user;
        $buyerUser = $purchasedNetapp->user;
        $sellerUser->notify(new NotifySellerAboutPurchasedNetApp($purchasedNetapp));
        $buyerUser->notify(new NotifyBuyerAboutPurchasedNetApp($purchasedNetapp));

        return $purchasedNetapp;
    }

    public function delete($id): bool {
        return $this->purchasedNetAppRepository->delete($id);
    }

    /**
     * Computes a hash string for a given purchased netapp.
     * The paradigm is: "Evolved5G-purchase: {net-app-creator email}-{byer's email}-netappId"
     * @param PurchasedNetApp $purchasedNetApp
     * @return string the computed hash
     */
    public function getHashForPurchasedNetApp(PurchasedNetApp $purchasedNetApp): string {
        $buyersEmail = $purchasedNetApp->user->email;
        $netapp = $purchasedNetApp->netapp;
        $sellersEmail = $netapp->user->email;
        return hash("sha256", "Evolved5G-purchase: " . $sellersEmail . "-" . $buyersEmail . "-" . $netapp->id);
    }

    public function getPurchasedNetAppsForUser(int $user_id): Collection {
        return $this->purchasedNetAppRepository->allWhere(['user_id' => $user_id], array('*'), 'created_at', 'desc', ['netapp', 'netapp.license']);
    }
}
