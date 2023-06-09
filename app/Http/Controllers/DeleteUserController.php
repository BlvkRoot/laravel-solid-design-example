<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Services\Users\DeleteUserService;
use Illuminate\Http\Response;

class DeleteUserController extends Controller
{
    public function __construct(private readonly DeleteUserService $deleteUserService) 
    {}

    public function handle(string $id): Response  
    {
        $this->deleteUserService->execute($id);
        return response('User Deleted!', 204);
    }
}
