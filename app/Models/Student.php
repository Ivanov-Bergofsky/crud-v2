<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   

    // Allow mass assignment for the following fields
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}
