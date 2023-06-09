<?php

namespace App\Repositories\Users;

use App\Dto\Users\UserDTO;

interface IUserRepository 
{
  public function save(UserDTO $user): void;
}