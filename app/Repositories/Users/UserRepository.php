<?php

namespace App\Repositories\Users;

use App\Dto\Users\UserDTO;
use App\Models\User;

class UserRepository implements IUserRepository
{
  public function __construct(private readonly User $user)
  {
  }

  public function save(UserDTO $user): void
  {
    $this->user->name = $user->name;
    $this->user->email = $user->email;
    $this->user->password = $user->password;
    $this->user->save();
  }

  public function findByEmail(string $email): User | null
  {
    return $this->user::where('email', $email)->first();
  }

  public function findById(string $id): User
  {
    return $this->user::find($id);
  }

  public function delete(User $user): void
  {
    $user->delete();
  }
}
