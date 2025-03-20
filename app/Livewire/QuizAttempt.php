<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Result;
class QuizAttempt extends Component
{
    public function render()
    {
        $attempts = Result::with('user', 'quiz')->latest()->get();
        return view('livewire.quiz-attempt',compact('attempts'));
    }
}
