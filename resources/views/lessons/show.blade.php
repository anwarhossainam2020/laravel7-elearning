@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lesson
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lessons.show_fields')
                    @if (!Auth::user()->isAdmin())
                        @if ($lessonFinished)
                        <button type="button" class="btn btn-primary">
                            Lesson Finished <span class="badge badge-success">Correct Answer: {{ $correctAnswerCounter }}</span>
                        </button>
                        @endif
                        {!! Form::open(['route' => ['lessons.save-answer', $lesson->id, 'course_id' => Request::input('course_id')], 'method' => 'post']) !!}
                        <div>
                            <h2>MCQ</h2>
                            <br/>
                            @foreach($questions as $qi => $question)
                            <div>
                                <h4><strong>Question {{$qi+1}}: {{ $question->question }}</strong></h4>
                                <div class="form-group">
                                <label>
                                    <input type="radio" 
                                        name="question[{{ $question->id }}]" 
                                        {{ isset($qids[$question->id]) && $qids[$question->id]=='option1' ? 'checked="checked"' : '' }}
                                        value="option1"> {{ $question->option1 }}</label><br/>
                                <label>
                                <input type="radio" 
                                        name="question[{{ $question->id }}]"                                     
                                        {{ isset($qids[$question->id]) && $qids[$question->id]=='option2' ? 'checked="checked"' : '' }}
                                        value="option2"> {{ $question->option2 }}</label><br/>
                                <label>
                                <input type="radio" 
                                        name="question[{{ $question->id }}]"                                     
                                        {{ isset($qids[$question->id]) && $qids[$question->id]=='option3' ? 'checked="checked"' : '' }}
                                        value="option3"> {{ $question->option3 }}</label><br/>
                                <label>
                                    <input type="radio" 
                                        name="question[{{ $question->id }}]"                                     
                                        {{ isset($qids[$question->id]) && $qids[$question->id]=='option4' ? 'checked="checked"' : '' }} 
                                        value="option4"> {{ $question->option4 }}</label><br/>
                                </div>
                                @if ($lessonFinished)
                                <div >
                                    Correct Answer: <span class="badge badge-success">{{ $question->{$question->answer} }}</span>
                                </div>
                                @endif
                                <br/>
                            </div>
                            @endforeach

                            @if (!$lessonFinished)
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}                        
                            </div>
                            @endif

                        </div>
                        {!! Form::close() !!}
                    @endif
                    <a href="{{ route('lessons.index', ['course_id' => Request::input('course_id')]) }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
