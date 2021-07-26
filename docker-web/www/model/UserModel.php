<?php

namespace Model;

use Helper\PdoConnexion;

class UserModel 
{

  protected $pdo;
  
  public function __construct()
  {
      $this->pdo = PdoConnexion::get();
  }

}
