<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $answer->user_id }}</p>
</div>

<!-- Lesson Id Field -->
<div class="form-group">
    {!! Form::label('lesson_id', 'Lesson Id:') !!}
    <p>{{ $answer->lesson_id }}</p>
</div>

<!-- Question Id Field -->
<div class="form-group">
    {!! Form::label('question_id', 'Question Id:') !!}
    <p>{{ $answer->question_id }}</p>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $answer->answer }}</p>
</div>

<!-- Answer At Field -->
<div class="form-group">
    {!! Form::label('answer_at', 'Answer At:') !!}
    <p>{{ $answer->answer_at }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $answer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $answer->updated_at }}</p>
</div>

