@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Course Subscribe
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($courseSubscribe, ['route' => ['courseSubscribes.update', $courseSubscribe->id], 'method' => 'patch']) !!}

                        @include('course_subscribes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection