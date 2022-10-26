<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Item
 * @package Source\models
 */
class Group extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("grupos", ["name", "description", "user_id_group", "teacher_id_group"]);
  }
}
