<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    protected $message = 'User not found';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 400);
    }
}
