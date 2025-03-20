<div>
    <div class="container mt-5">
        <h2>{{ $quiz->title }}</h2>
        <p>{{ $quiz->description }}</p>

        <div class="alert alert-warning">
            Time Remaining: <span id="timer">{{ gmdate('i:s', $timeLeft) }}</span>
        </div>

        <form wire:submit.prevent="submitQuiz">
            @foreach ($questions as $question)
                <div class="mb-3">
                    <h5>{{ $question->question_text }}</h5>
                    @foreach ($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="userAnswers.{{ $question->id }}"
                                value="{{ $option->id }}">
                            <label class="form-check-label">{{ $option->option_text }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Submit Quiz</button>
        </form>
    </div>
</div>
@section('externaljs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let timer = document.getElementById('timer');
            let timeLeft = {{ $timeLeft }};

            function updateTimer() {
                if (timeLeft <= 0) {
                    alert("Time's up! Your quiz will be submitted automatically.");
                    Livewire.emit('submitQuiz');
                } else {
                    timeLeft--;
                    let minutes = Math.floor(timeLeft / 60);
                    let seconds = timeLeft % 60;
                    timer.innerText = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
                    setTimeout(updateTimer, 1000);
                }
            }
            updateTimer();
        });
    </script>
@endsection
