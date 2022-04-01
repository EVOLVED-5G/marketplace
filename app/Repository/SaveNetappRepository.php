<?php

namespace App\Repository;

use App\Models\SavedNetapp;
use App\Repository\Repository;

class SaveNetappRepository extends Repository
{
  //protected $entity = =SavedNetapp::class;
  function getModelClassName()
  {
    return  SavedNetapp::class;
  }
  public function create($data)
  {
    return parent::create($data);
  }
  public function delete($id)
  {
    return parent::delete($id);
  }
}
