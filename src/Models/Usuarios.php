<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Usuarios
 * @package Source\models
 */
class Usuarios extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("usuarios", ["name", "username", "password", "access"]);
  }
}
