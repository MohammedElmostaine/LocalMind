<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Questions;

class Categories extends Model
{


    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
