<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizAppear extends Component
{
    public $quiz;
    public $questions;
    public $userAnswers = [];
    public $timeLeft;

    public function mount()
    {
        $quizId = session('quizId');
        $this->quiz = Quiz::findOrFail($quizId);
        $this->questions = Question::where('quiz_id', $quizId)->with('options')->get();
        $this->timeLeft = $this->quiz->duration * 60;
    }

    public function submitQuiz()
    {
        $score = 0;

        foreach ($this->questions as $question) {
            $correctOption = Option::where('question_id', $question->id)->where('is_correct', true)->first();

            if ($correctOption && isset($this->userAnswers[$question->id]) && $this->userAnswers[$question->id] == $correctOption->id) {
                $score++;
            }
        }

        Result::create([
            'user_id' => Auth::id(),
            'quiz_id' => $this->quiz->id,
            'score' => $score,
        ]);

        $this->dispatch('notify', type: 'success', message: "Quiz submitted successfully! Your Score: $score");
        $this->redirect('quiz-list');
    }

    public function render()
    {
        return view('livewire.quiz-appear');
    }
}
