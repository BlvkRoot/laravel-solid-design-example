<?php

namespace App\Repositories\Users;

use App\Dto\Users\UserDTO;
use App\Models\User;

interface IUserRepository 
{
  public function save(UserDTO $user): void;
  public function findByEmail(string $email): User | null;
}