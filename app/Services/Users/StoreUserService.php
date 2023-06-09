<?php

namespace App\Services\Users;

use App\Dto\Users\UserDto;
use App\Repositories\Users\IUserRepository;

class StoreUserService
{
  public function __construct(private readonly IUserRepository $userRepository)
  {
  }
  
  public function execute(UserDto $user): void
  {
    $this->userRepository->save($user);
  }
}
