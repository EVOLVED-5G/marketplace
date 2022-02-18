<?php


namespace App\BusinessLogicLayer\ApiEndpoint;

use App\Models\ApiEndpoint;
use App\Repository\ApiEndpointRepository;

class ApiEndpointManager
{

    protected $apiEndpointRepository;

    public function __construct(ApiEndpointRepository $apiEndpointRepository)
    {

        $this->apiEndpointRepository = $apiEndpointRepository;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create($requestData): ApiEndpoint
    {
        $endpoint = $this->apiEndpointRepository->create([
            'url' => $requestData
        ]);

        return $endpoint;
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
