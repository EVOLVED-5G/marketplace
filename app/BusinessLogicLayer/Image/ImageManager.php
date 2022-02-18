<?php


namespace App\BusinessLogicLayer\Image;

use App\Models\Document;
use App\Models\Image;
use App\Repository\ImageRepository;

class ImageManager
{

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {

        $this->imageRepository = $imageRepository;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData): Image
    {



        $document = $this->imageRepository->create([
            'imageable_type' => $requestData['imageable_type'],
            'imageable_id' => $requestData['imageable_id'],
            'url' => $requestData['url'],
            'type' => $requestData['type'],
        ]);

        return $document;
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
