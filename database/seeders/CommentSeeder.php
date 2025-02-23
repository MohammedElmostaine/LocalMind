<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have some questions and users already seeded
        $questions = Question::all();
        $users = User::all();

        foreach ($questions as $question) {
            foreach ($users as $user) {
                Comment::factory()->create([
                    'question_id' => $question->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
