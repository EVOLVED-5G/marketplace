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
    return parent::insert($data);
  }
}
