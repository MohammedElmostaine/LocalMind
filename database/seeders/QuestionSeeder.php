<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Questions::factory(10)->create();
    }
}
