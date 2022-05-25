<?php


namespace App\BusinessLogicLayer\ApiPaymentPlan;

use App\Models\ApiPaymentPlan as ModelApiPaymentPlan;
use App\Repository\ApiPaymentPlanRepository;

class ApiPaymentPlanManager
{

    protected $apipaymentPlanRepository;

    public function __construct(ApiPaymentPlanRepository $apipaymentPlanRepository)
    {

        $this->apipaymentPlanRepository = $apipaymentPlanRepository;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData, $apiEndpointId): bool
    {

        $newRequest = [];

        foreach ($requestData as $request) {
            $request['api_endpoint_id'] = $apiEndpointId;
            array_push($newRequest, $request);
        }


        $paymentplan = $this->apipaymentPlanRepository->create($newRequest);
        return $paymentplan;
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
