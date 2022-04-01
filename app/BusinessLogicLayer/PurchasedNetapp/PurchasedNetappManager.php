<?php


namespace App\BusinessLogicLayer\PurchasedNetapp;

use App\Models\PurchasedNetapp;
use App\Models\User;
use App\Repository\PurchasedNetappRepository;

class PurchasedNetappManager
{

    protected $purchasedNetapp;

    public function __construct(PurchasedNetappRepository $purchasedNetapp)
    {

        $this->purchasedNetapp = $purchasedNetapp;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData): PurchasedNetapp
    {
        $purchasedNetapp = $this->purchasedNetapp->create($requestData);
        return $purchasedNetapp;
    }
    public function delete($id): bool
    {
        return $this->purchasedNetapp->delete($id);
    }



    /**
     * Updates a User in the DB.
     * Also checks the existence of the administrator field
     * in the request data, and adds or removes the administrator role.
     *
     * @param int $id the id of the user to be updated
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
}
