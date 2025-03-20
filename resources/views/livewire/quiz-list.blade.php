<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="/quiz-menu" class="list-group-item list-group-item-action">Quiz Management</a>
                    <a href="/quiz-attempt" class="list-group-item list-group-item-action">Quiz Attempts</a>
                    <a href="/quiz-list" class="list-group-item list-group-item-action active">Quiz List</a>
                    <a href="/logout" class="list-group-item list-group-item-action">Log Out</a>
                </div>
            </div>

            <div class="col-md-9">
                <h2 class="mb-4">Available Quizzes</h2>

                @if($availableQuizzes->isEmpty())
                    <p class="text-muted">No quizzes available at the moment.</p>
                @else
                    <div class="list-group">
                        @foreach($availableQuizzes as $quiz)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $quiz->title }}</h5>
                                    <p class="mb-1">{{ $quiz->description }}</p>
                                    <small>Duration: {{ $quiz->duration }} minutes</small>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-primary" wire:click="appearQuiz({{$quiz->id}})">Attempt Quiz</a>
                            </div>
                        @endforeach
                    </div>
                @endif

                <h2 class="mt-5">Attended Quizzes</h2>
                @if($attendedQuizzes->isEmpty())
                    <p class="text-muted">You haven't attempted any quizzes yet.</p>
                @else
                    <div class="list-group">
                        @foreach($attendedQuizzes as $attempt)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $attempt->quiz->title }}</h5>
                                    <p class="mb-1">Your Score: {{ $attempt->score }}</p>
                                </div>
                                {{-- <a href="{{ route('application.quiz-review', $attempt->quiz->id) }}" class="btn btn-secondary">Review</a> --}}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
