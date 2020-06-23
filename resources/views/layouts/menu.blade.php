<li class="{{ Request::is('courses*') ? 'active' : '' }}">
    <a href="{{ route('courses.index') }}"><i class="fa fa-edit"></i><span>Courses</span></a>
</li>



@if(Auth::user()->isAdmin())

<li class="{{ Request::is('lessons*') ? 'active' : '' }}">
    <a href="{{ route('lessons.index') }}"><i class="fa fa-edit"></i><span>Lessons</span></a>
</li>


<li class="{{ Request::is('questions*') ? 'active' : '' }}">
    <a href="{{ route('questions.index') }}"><i class="fa fa-edit"></i><span>Questions</span></a>
</li>
@endif

