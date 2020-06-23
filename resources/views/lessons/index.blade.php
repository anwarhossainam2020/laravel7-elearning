@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Lessons</h1>
        <h1 class="pull-right">
            @if(Auth::user()->isAdmin())
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('lessons.create') }}">Add New</a>
            @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('lessons.table')
            </div>
        </div>
        <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $lessons])

        </div>
    </div>
@endsection

