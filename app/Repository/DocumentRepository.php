<?php

namespace App\Repository;

use App\Models\Document;
use App\Repository\Repository;

class DocumentRepository extends Repository
{
  //protected $entity = Document::class;
  function getModelClassName()
  {
    return  Document::class;
  }
  public function create(array $data)
  {
    return parent::create([
      'documentable_type' => $data['documentable_type'],
      'documentable_id' => $data['documentable_id'],
      'url' => $data['url'],
      'type' => $data['type'],
    ]);
  }
}
