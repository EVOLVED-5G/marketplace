<?php

namespace App\Repository;

use App\Models\ApiEndpoint;
use App\Repository\Repository;

class ApiEndpointRepository extends Repository
{
  //protected $entity = ApiEndpoint::class;
  function getModelClassName()
  {
    return  ApiEndpoint::class;
  }
  public function create(array $data)
  {

    return parent::create([
      "url" => $data["url"],
      "netapp_id" => $data["netapp_id"],
    ]);
  }
}
