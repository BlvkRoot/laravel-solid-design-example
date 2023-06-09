<?php

namespace App\Services\Users;

use App\Dto\Users\UserDto;

class StoreUserService extends BaseUserService
{
  public function execute(UserDto $user): void
  {
    $this->findUserByEmail($user->email);
    $this->userRepository->save($user);
  }
}
