<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Composicao
 * @package Source\models
 */
class Composicao extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("composicao", ["usuario_id", "grupo_id"]);
  }
}
