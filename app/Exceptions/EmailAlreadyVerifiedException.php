<?php

namespace App\Exceptions;

use Exception;

class EmailAlreadyVerifiedException extends Exception
{
    protected $message = 'Email already verified.';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 400);
    }
}
