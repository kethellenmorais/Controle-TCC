<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Item
 * @package Source\models
 */
class User extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("usuarios", ["name", "username", "password", "access"]);
  }
}
