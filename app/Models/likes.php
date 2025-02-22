<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class likes extends Model
{
    protected $guarded = [];

    public function likeable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
