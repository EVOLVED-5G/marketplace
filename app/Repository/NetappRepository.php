<?php

namespace App\Repository;

use App\Models\Netapp;
use App\Repository\Repository;

class NetappRepository extends Repository
{
  //protected $entity = Netapp::class;
  function getModelClassName()
  {
    return  Netapp::class;
  }
  public function create(array $data)
  {

    return parent::create([
      "name" => $data["name"],
      "about" => $data["about"],
      "url_site" => "",
      "category_id" => $data["category_id"],
      "version" => $data["version"],
      "published_by" => $data["publishedBy"],
      "business_name" => $data["businessName"],
      "social_number" => $data["socialNumber"],
      "docker_image_url" => $data["imageUrl"],
      "docker_size" => $data["dockerSize"],
      "certificate_url" => $data["report"],
      "policy" => $data["agreePolicy"],
      "tutorial_docs" => $data["docs"],
      "fix_price" => $data["price"],
      'type_id' => $data["type"],
      "user_id" => $data['user_id'],
      'tags' => json_encode($data["tag"]),
    ]);
  }
}
