<?php

namespace App\Services\Users;

class DeleteUserService extends BaseUserService
{
  public function execute(string $id): void
  {
    $user = $this->findUserById($id);
    $this->userRepository->delete($user);
  }
}
