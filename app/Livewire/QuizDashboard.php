<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quiz;

class QuizDashboard extends Component
{
    public $title, $description, $duration;
    public $quizzes;

    public function createQuiz()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
        ]);

        Quiz::create([
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration,
        ]);

        $this->dispatch('notify', type: 'success', message: 'Quiz Created Successfully!');
        $this->cleanVar();
    }

    public function deleteQuiz($id)
    {
        Quiz::find($id)->delete();
        $this->dispatch('notify', type: 'success', message: 'Quiz Deleted Successfully!');
    }

    public function cleanVar(){
        $this->title = '';
        $this->description = '';
        $this->duration = '';
    }

    public function render()
    {
        $this->quizzes = Quiz::all();

        return view('livewire.quiz-dashboard');
    }
}
