<div class="table-responsive">
    <table class="table" id="courseSubscribes-table">
        <thead>
            <tr>
                <th>Course</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courseSubscribes as $courseSubscribe)
            <tr>
                <td>{{ $courseSubscribe->course->name }}</td>
                <td>
                    {!! Form::open(['route' => ['courseSubscribes.destroy', $courseSubscribe->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('courseSubscribes.show', [$courseSubscribe->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('courseSubscribes.edit', [$courseSubscribe->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
