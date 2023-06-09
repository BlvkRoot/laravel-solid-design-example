<?php

namespace App\Services\Users;

use App\Exceptions\DuplicateEmailException;
use App\Exceptions\InvalidUserException;
use App\Models\User;
use App\Repositories\Users\IUserRepository;

class BaseUserService 
{
  public function __construct(protected readonly IUserRepository $userRepository)
  {
  }

  protected function findUserByEmail(string $email)
  {
    if ($this->userRepository->findByEmail($email)) 
      throw new DuplicateEmailException();
  }

  protected function findUserById(string $id): User 
  {
    $user = $this->userRepository->findById($id);
    if (!$user) throw new InvalidUserException();

    return $user;
  }
}