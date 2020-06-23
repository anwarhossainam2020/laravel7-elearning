@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lesson
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lesson, ['route' => ['lessons.update', $lesson->id], 'method' => 'patch']) !!}

                        @include('lessons.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection