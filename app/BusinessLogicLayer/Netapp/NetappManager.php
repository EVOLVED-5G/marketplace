<?php


namespace App\BusinessLogicLayer\Netapp;


use App\BusinessLogicLayer\TMForumAPI\TMForumAPIManager;
use App\Jobs\StoreNetAppAsProductInTMForum;
use App\Models\Netapp;
use App\Repository\NetappRepository;
use Illuminate\Support\Str;

class NetappManager {

    protected $netappRepository;

    public function __construct(NetappRepository $netappRepository) {

        $this->netappRepository = $netappRepository;
    }

    /**
     * Creates a @Netapp record
     *
     * @param array $requestData array with the form data
     * @return Netapp the newly created netapp
     */
    public function create(array $requestData): Netapp {
        $tags = [];
        foreach ($requestData["service"]['tag'] as $tag) {
            array_push($tags, $tag['value']);
        }
        $netapp = $this->netappRepository->create([
            "name" => $requestData["service"]["name"],
            'marketing_url' => $requestData['service']['marketing_url'],
            'app_slug' => Str::slug($requestData['service']['appSlug']),
            "about" => $requestData["service"]["about"],
            "category_id" => $requestData["service"]["category"],
            "version" => $requestData["service"]["version"],
            "publishedBy" => $requestData["service"]["publishedBy"],
            "businessName" => $requestData["service"]["businessName"],
            "socialNumber" => $requestData["service"]["socialNumber"],
            "githubURL" => $requestData["deployment"]["githubURL"],
            "fingerprint_code" => $requestData["deployment"]["fingerprint_code"],
            "dockerSize" => $requestData["deployment"]["dockerSize"],
            "docker_image_url" => $requestData["deployment"]["docker_image_url"],
            "agreePolicy" => $requestData["policy"]["agreePolicy"],
            "docs" => $requestData["tutorial"]["docs"],
            "price" => $requestData["pricing"]["price"],
            'type' => $requestData["service"]["type"],
            'logo' => $requestData["service"]["logo"],
            'tag' => $tags,
            'pdf' => $requestData['tutorial']['pdf'],
            'user_id' => auth()->user()->id,
        ]);
        if ($requestData['paymentplan'] === "onceoff" && TMForumAPIManager::isForumAPIEnabled())
            StoreNetAppAsProductInTMForum::dispatch($netapp, false);
        return $netapp;
    }

    /**
     * Updates a @see Netapp in the DB.
     *
     * @param int $id the id of the netapp to be updated
     * @param array $requestData array with the form data
     * @return Netapp the newly created user
     */
    public function update(array $requestData, int $id): Netapp {
        $tags = [];
        foreach ($requestData["service"]['tag'] as $tag) {
            array_push($tags, $tag['value']);
        }
        $netapp = $this->netappRepository->update([
            "name" => $requestData["service"]["name"],
            "visible" => $requestData["visible"],
            'marketing_url' => $requestData['service']['marketing_url'],
            'app_slug' => Str::slug($requestData['service']['appSlug']),
            "about" => $requestData["service"]["about"],
            "category_id" => $requestData["service"]["category"],
            "version" => $requestData["service"]["version"],
            "publishedBy" => $requestData["service"]["publishedBy"],
            "businessName" => $requestData["service"]["businessName"],
            "socialNumber" => $requestData["service"]["socialNumber"],
            "githubURL" => $requestData["deployment"]["githubURL"],
            "fingerprint_code" => $requestData["deployment"]["fingerprint_code"],
            "dockerSize" => $requestData["deployment"]["dockerSize"],
            "docker_image_url" => $requestData["deployment"]["docker_image_url"],
            "agreePolicy" => $requestData["policy"]["agreePolicy"],
            "docs" => $requestData["tutorial"]["docs"],
            "price" => $requestData["pricing"]["price"],
            'type' => $requestData["service"]["type"],
            'logo' => $requestData["service"]["logo"],
            'tag' => $tags,
            'pdf' => $requestData['tutorial']['pdf'],
            'user_id' => auth()->user()->id,
        ], $id);

        if ($requestData['paymentplan'] === "onceoff" && TMForumAPIManager::isForumAPIEnabled())
            StoreNetAppAsProductInTMForum::dispatch($netapp);
        return $netapp;
    }
}
