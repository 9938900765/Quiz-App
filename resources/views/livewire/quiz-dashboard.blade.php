<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="/quiz-menu" class="list-group-item list-group-item-action active">Quiz Management</a>
                    <a href="/quiz-attempt" class="list-group-item list-group-item-action ">Quiz Attempts</a>
                    <a href="/quiz-list" class="list-group-item list-group-item-action">Quiz List</a>
                    <a href="/logout" class="list-group-item list-group-item-action">Log Out</a>
                </div>
            </div>

            <div class="col-md-9">
                <h2 class="mb-4">Quiz Management</h2>

                <div class="card mb-4">
                    <div class="card-header">Create New Quiz</div>
                    <div class="card-body">
                        <form wire:submit.prevent="createQuiz">
                            <div class="mb-3">
                                <label for="title" class="form-label">Quiz Title</label>
                                <input type="text" class="form-control" wire:model="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration (minutes)</label>
                                <input type="number" class="form-control" wire:model="duration" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Quiz</button>
                        </form>
                    </div>
                </div>

                <h3>Existing Quizzes</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ $quiz->description }}</td>
                                <td>{{ $quiz->duration }} mins</td>
                                <td>
                                    <button wire:click="deleteQuiz({{ $quiz->id }})" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(session()->has('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
