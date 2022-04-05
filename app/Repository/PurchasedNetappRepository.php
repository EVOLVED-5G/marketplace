<?php

namespace App\Repository;

use App\Models\PurchasedNetapp;
use App\Repository\Repository;

class PurchasedNetappRepository extends Repository
{
  //protected $entity = PurchasedNetapp::class;
  function getModelClassName()
  {
    return  PurchasedNetapp::class;
  }
}
