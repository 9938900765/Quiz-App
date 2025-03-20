<div>
    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="/quiz-menu" class="list-group-item list-group-item-action">Quiz Management</a>
                    <a href="/quiz-attempt" class="list-group-item list-group-item-action active">Quiz Attempts</a>
                    <a href="/quiz-list" class="list-group-item list-group-item-action">Quiz List</a>
                    <a href="/logout" class="list-group-item list-group-item-action">Log Out</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h2>Quiz Attempts</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Quiz</th>
                            <th>Score</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attempts as $attempt)
                            <tr>
                                <td>{{ $attempt->user->name }}</td>
                                <td>{{ $attempt->quiz->title }}</td>
                                <td>{{ $attempt->score }}</td>
                                <td>{{ $attempt->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
