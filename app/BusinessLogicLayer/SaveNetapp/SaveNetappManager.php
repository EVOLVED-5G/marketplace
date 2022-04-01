<?php


namespace App\BusinessLogicLayer\SaveNetapp;


use App\Models\Netapp;
use App\Models\SavedNetapp;
use App\Models\User;
use App\Repository\NetappRepository;
use App\Repository\SaveNetappRepository;
use Illuminate\Support\Facades\Auth;

class SaveNetappManager
{

    protected $saveNetapp;

    public function __construct(SaveNetappRepository $saveNetapp)
    {

        $this->saveNetapp = $saveNetapp;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData): SavedNetapp
    {
        $saveNetapp = $this->saveNetapp->create($requestData);
        return $saveNetapp;
    }
    public function delete($id): bool
    {
        return $this->saveNetapp->delete($id);
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
