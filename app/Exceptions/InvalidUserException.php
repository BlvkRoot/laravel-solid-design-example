<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvalidUserException extends Exception
{
    public function render(Request $request): Response
    {
        return response('Invalid User!', Response::HTTP_FOUND);
    }
}
