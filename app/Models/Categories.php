<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
