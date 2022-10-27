<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Entregas
 * @package Source\models
 */
class Entregas extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("entregas", ["name", "date", "teacher_id_entregas"]);
  }
}
