<!-- Lesson Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    {!! Form::select('course_id', $courseList, null, ['class' => 'form-control']) !!}
</div>

<!-- Lesson Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lesson_id', 'Lesson:') !!}
    {!! Form::select('lesson_id', $lessonList, null, ['class' => 'form-control']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Option1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('option1', 'Option1:') !!}
    {!! Form::text('option1', null, ['class' => 'form-control']) !!}
</div>

<!-- Option2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('option2', 'Option2:') !!}
    {!! Form::text('option2', null, ['class' => 'form-control']) !!}
</div>

<!-- Option3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('option3', 'Option3:') !!}
    {!! Form::text('option3', null, ['class' => 'form-control']) !!}
</div>

<!-- Option4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('option4', 'Option4:') !!}
    {!! Form::text('option4', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::select('answer', [
        'option1' => 'option1',
        'option2' => 'option2',
        'option3' => 'option3',
        'option4' => 'option4'
    ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questions.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
 
<script>
$(document).ready(function($){
    $( "#course_id" ).change(function() {
        const url = '/lessons/'+ ($(this).val()) +'/load-select-option-for-course'
        $("#lesson_id").load(url);
    });
});
</script>
 
@endpush
