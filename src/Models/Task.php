<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Item
 * @package Source\models
 */
class Task extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("entregas", ["name", "date"]);
  }
}
