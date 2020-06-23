<div class="table-responsive">
    <table class="table" id="lessons-table">
        <thead>
            <tr>
                <th>Course</th>
                <th colspan="1">Lesson Name / Details</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->course->name }}</td>
                <td>
                    <strong>{{ $lesson->name }}</strong><br/>
                    <div>{{ $lesson->details }}</div>
                </td>
                <td>
                @if (Auth::user() && Auth::user()->isAdmin())
                    {!! Form::open(['route' => ['lessons.destroy', $lesson->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lessons.show', [$lesson->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('lessons.edit', [$lesson->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    @else
                        <a href="{{ route('lessons.show', [$lesson->id, 'course_id' => Request::input('course_id')]) }}" class='btn btn-primary btn-xs'>Complete Lesson</a>
                        
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
