<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Grupos
 * @package Source\models
 */
class Grupos extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("grupos", ["name", "description", "teacher_id_group"]);
  }
}
