<?php

namespace App\Repository;

use App\Models\PurchasedNetApp;
use App\Repository\Repository;

class PurchasedNetAppRepository extends Repository
{
  //protected $entity = PurchasedNetapp::class;
  function getModelClassName()
  {
    return  PurchasedNetApp::class;
  }
}
