<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $quizzes = [];
        for ($i = 1; $i <= 3; $i++) {
            $quizzes[] = [
                'title' => "Sample Quiz $i",
                'description' => "This is a description for Quiz $i.",
                'duration' => rand(10, 30),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('quizzes')->insert($quizzes);

        $quizIds = DB::table('quizzes')->pluck('id');

        $questions = [];
        foreach ($quizIds as $quizId) {
            for ($j = 1; $j <= 5; $j++) {
                $questions[] = [
                    'quiz_id' => $quizId,
                    'question_text' => "What is the answer to question $j of Quiz $quizId?",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('questions')->insert($questions);

        $questionIds = DB::table('questions')->pluck('id');

        $options = [];
        foreach ($questionIds as $questionId) {
            $correctOption = rand(1, 4); // Randomly choose a correct option
            for ($k = 1; $k <= 4; $k++) {
                $options[] = [
                    'question_id' => $questionId,
                    'option_text' => "Option $k for question $questionId",
                    'is_correct' => ($k == $correctOption), // Mark one correct
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('options')->insert($options);

        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                [
                    'name' => 'Admin User',
                    'email' => 'admin@example.com',
                    'password' => bcrypt('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Test User',
                    'email' => 'user@example.com',
                    'password' => bcrypt('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        $users = DB::table('users')->pluck('id');
        $results = [];
        foreach ($users as $userId) {
            foreach ($quizIds as $quizId) {
                $results[] = [
                    'user_id' => $userId,
                    'quiz_id' => $quizId,
                    'score' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('results')->insert($results);
    }
}
