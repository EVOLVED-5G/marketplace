<?php


namespace App\BusinessLogicLayer\Document;

use App\Models\Document;
use App\Models\User;
use App\Repository\DocumentRepository;


class DocumentManager
{

    protected $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {

        $this->documentRepository = $documentRepository;
    }

    /**
     * Creates a @User record and assigns the RegisteredUser role
     * by default. If the data array includes a field for Administrator role,
     * the role is added as well.
     *
     * @param array $requestData array with the form data
     * @return User the newly created user
     */
    public function create(array $requestData): Document
    {



        $document = $this->documentRepository->create([
            'documentable_type' => $requestData['documentable_type'],
            'documentable_id' => $requestData['documentable_id'],
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
