<div class="table-responsive">
    <table class="table" id="answers-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Lesson Id</th>
        <th>Question Id</th>
        <th>Answer</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($answers as $answer)
            <tr>
                <td>{{ $answer->user_id }}</td>
            <td>{{ $answer->lesson_id }}</td>
            <td>{{ $answer->question_id }}</td>
            <td>{{ $answer->answer }}</td>
                <td>
                    {!! Form::open(['route' => ['answers.destroy', $answer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('answers.show', [$answer->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('answers.edit', [$answer->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
