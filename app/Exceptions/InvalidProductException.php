<?php
namespace App\Exceptions;
use Exception;
class InvalidProductException extends Exception{
    public function context()
    {
        return ['product_id' => $this->id];
    }
}