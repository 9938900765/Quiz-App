<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizList extends Component
{
    public $availableQuizzes = [];
    public $attendedQuizzes = [];

    public function mount()
    {
        $userId = Auth::id();

        $attemptedQuizIds = Result::where('user_id', $userId)->pluck('quiz_id');

        $this->availableQuizzes = Quiz::whereNotIn('id', $attemptedQuizIds)->get();

        $this->attendedQuizzes = Result::where('user_id', $userId)->with('quiz')->get();
    }


    public function appearQuiz($quizId)
    {
        session(['quizId' => $quizId]);
        return redirect()->to('/quiz-appear');
    }

    public function render()
    {
        return view('livewire.quiz-list');
    }
}
