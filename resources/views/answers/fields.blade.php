<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lesson Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lesson_id', 'Lesson Id:') !!}
    {!! Form::text('lesson_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_id', 'Question Id:') !!}
    {!! Form::text('question_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('answers.index') }}" class="btn btn-default">Cancel</a>
</div>
