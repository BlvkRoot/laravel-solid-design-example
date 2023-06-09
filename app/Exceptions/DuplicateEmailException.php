<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DuplicateEmailException extends Exception
{
    public function render(Request $request): Response
    {
        return response('Email already exists!', Response::HTTP_FOUND);
    }
}
