<?php


namespace App\BusinessLogicLayer\PurchasedNetapp;

use App\Jobs\CreateBlockchainTransactionForPurchasedNetapp;
use App\Models\PurchasedNetapp;
use App\Models\User;
use App\Notifications\NotifyBuyerAboutPurchasedNetapp;
use App\Notifications\NotifySellerAboutPurchasedNetapp;
use App\Repository\PurchasedNetappRepository;

class PurchasedNetappManager {

    protected $purchasedNetappRepository;

    public function __construct(PurchasedNetappRepository $purchasedNetappRepository) {

        $this->purchasedNetappRepository = $purchasedNetappRepository;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData): PurchasedNetapp {
        $purchasedNetapp = $this->purchasedNetappRepository->create($requestData);
        $hash = $this->getHashForPurchasedNetapp($purchasedNetapp);
        $this->purchasedNetappRepository->update([
            'hash' => $hash
        ], $purchasedNetapp->id);

        CreateBlockchainTransactionForPurchasedNetapp::dispatch($purchasedNetapp);
        $sellerUser = $purchasedNetapp->netapp->user;
        $buyerUser = $purchasedNetapp->user;
        $sellerUser->notify(new NotifySellerAboutPurchasedNetapp($purchasedNetapp));
        $buyerUser->notify(new NotifyBuyerAboutPurchasedNetapp($purchasedNetapp));

        return $purchasedNetapp;
    }

    public function delete($id): bool {
        return $this->purchasedNetappRepository->delete($id);
    }

    /**
     * Computes a hash string for a given purchased netapp.
     * The paradigm is: "Evolved5G-purchase: {net-app-creator email}-{byer's email}-netappId"
     * @param PurchasedNetapp $purchasedNetapp
     * @return string the computed hash
     */
    public function getHashForPurchasedNetapp(PurchasedNetapp $purchasedNetapp): string {
        $buyersEmail = $purchasedNetapp->user->email;
        $netapp = $purchasedNetapp->netapp;
        $sellersEmail = $netapp->user->email;
        return hash("sha256", "Evolved5G-purchase: " . $sellersEmail . "-" . $buyersEmail . "-" . $netapp->id);
    }
}
