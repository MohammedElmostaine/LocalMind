<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Categorie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
