<?php


namespace App\BusinessLogicLayer\Netapp;


use App\Models\Netapp;
use App\Models\User;
use App\Repository\NetappRepository;
use Illuminate\Support\Facades\Auth;

class NetappManager
{

    protected $netappRepository;

    public function __construct(NetappRepository $netappRepository)
    {

        $this->netappRepository = $netappRepository;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData): Netapp
    {
        $tags = [];
        foreach ($requestData["service"]['tag'] as $tag) {
            array_push($tags, $tag['value']);
        }
        $netapp = $this->netappRepository->create([
            "name" => $requestData["service"]["name"],
            "about" => $requestData["service"]["about"],
            "category_id" => $requestData["service"]["category"],
            "version" => $requestData["service"]["version"],
            "publishedBy" => $requestData["service"]["publishedBy"],
            "businessName" => $requestData["service"]["businessName"],
            "socialNumber" => $requestData["service"]["socialNumber"],
            "imageUrl" => $requestData["deployment"]["imageUrl"],
            "dockerSize" => $requestData["deployment"]["dockerSize"],
            "report" => $requestData["deployment"]["report"],
            "agreePolicy" => $requestData["policy"]["agreePolicy"],
            "docs" => $requestData["tutorial"]["docs"],
            "price" => $requestData["pricing"]["price"],
            'type' => $requestData["service"]["type"],
            'logo' => $requestData["service"]["logo"],
            'tag' => $tags,
            'pdf' => $requestData['tutorial']['pdf'],
            'user_id' => auth()->user()->id,
        ]);

        return $netapp;
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
