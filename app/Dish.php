<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['title', 'price'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
