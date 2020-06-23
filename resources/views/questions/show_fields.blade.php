<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', 'Course:') !!}
    <p>{{ $question->course->name }}</p>
</div>
<!-- Lesson Id Field -->
<div class="form-group">
    {!! Form::label('lesson_id', 'Lesson:') !!}
    <p>{{ $question->lesson->name }}</p>
</div>

<!-- Question Field -->
<div class="form-group">
    {!! Form::label('Question', 'Question:') !!}
    <p>{{ $question->question }}</p>
</div>

<!-- Option1 Field -->
<div class="form-group">
    {!! Form::label('option1', 'Option1:') !!}
    <p>{{ $question->option1 }}</p>
</div>

<!-- Option2 Field -->
<div class="form-group">
    {!! Form::label('option2', 'Option2:') !!}
    <p>{{ $question->option2 }}</p>
</div>

<!-- Option3 Field -->
<div class="form-group">
    {!! Form::label('option3', 'Option3:') !!}
    <p>{{ $question->option3 }}</p>
</div>

<!-- Option4 Field -->
<div class="form-group">
    {!! Form::label('option4', 'Option4:') !!}
    <p>{{ $question->option4 }}</p>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $question->answer }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $question->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $question->updated_at }}</p>
</div>

