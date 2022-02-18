<?php

namespace App\Repository;

use App\Models\Image;
use App\Repository\Repository;

class ImageRepository extends Repository
{
  //protected $entity = Image::class;
  function getModelClassName()
  {
    return  Image::class;
  }
  public function create(array $data)
  {
    return parent::create([
      'imageable_type' => $data['imageable_type'],
      'imageable_id' => $data['imageable_id'],
      'url' => $data['url'],
      'type' => $data['type'],
    ]);
  }
}
