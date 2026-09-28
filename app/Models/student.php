<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('nis','name','gender','major','class')]
#[Table('students')]

class student extends Model
{
    //
}
