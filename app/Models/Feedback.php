<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function create($name, $email, $message)
    {
        if (empty($name) || empty($email) || empty($message)) {
            return false;
        }

        return true;
    }

}
