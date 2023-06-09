<?php

namespace App\Http\Controllers;

use App\Dto\Users\UserDTO;
use App\Http\Requests\StoreUserRequest;
use App\Services\Users\StoreUserService;

class StoreUserController extends Controller
{
    public function __construct(private readonly StoreUserService $storeUserService) 
    {}

    public function handle(StoreUserRequest $userRequest) 
    {
        $user = new UserDTO(...$userRequest->validated());
        $this->storeUserService->execute($user);
        return response('User Created!', 201);
    }
}
