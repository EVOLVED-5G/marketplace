<?php

namespace App\Repository;

use App\Models\ApiPaymentPlan;
use App\Repository\Repository;

class ApiPaymentPlanRepository extends Repository
{

  function getModelClassName()
  {
    return  ApiPaymentPlan::class;
  }
  public function create(array $data)
  {
    return parent::insert($data);
  }
}
