<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\CourseRepository;
use App\Repositories\CourseSubscribeRepository;
use App\Models\CourseSubscribe;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;

class CourseController extends AppBaseController
{
    /** @var  CourseRepository */
    private $courseRepository;
    
    /** @var  CourseSubscribeRepository */
    private $courseSubscribeRepository;

    public function __construct(CourseRepository $courseRepo, CourseSubscribeRepository $courseSubscribeRepo)
    {
        $this->courseRepository = $courseRepo;
        $this->courseSubscribeRepository = $courseSubscribeRepo;
    }

    /**
     * Display a listing of the Course.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id ?? null;
        $courses = $this->courseRepository->paginate(10);
        $csids = [];

        if ($user_id) {
            $csids = CourseSubscribe::where('user_id', $user_id)->get()->toArray();
            $csids = collect($csids)->pluck('course_id')->all();   
        }

        return view('courses.index')
        ->with('courses', $courses)
        ->with('csids', $csids)
            ;
    }

    /**
     * Show the form for creating a new Course.
     *
     * @return Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created Course in storage.
     *
     * @param CreateCourseRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseRequest $request)
    {
        $input = $request->all();

        $course = $this->courseRepository->create($input);

        Flash::success('Course saved successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified Course.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified Course.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified Course in storage.
     *
     * @param int $id
     * @param UpdateCourseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseRequest $request)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        $course = $this->courseRepository->update($request->all(), $id);

        Flash::success('Course updated successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified Course from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        $this->courseRepository->delete($id);

        Flash::success('Course deleted successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Course Subscribe
     *
     * @param int $id
     * @param UpdateCourseRequest $request
     *
     * @return Response
     */
    public function subscribe($id, UpdateCourseRequest $request)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }
        $user_id = Auth::user()->id;
        
        $csr = $this->courseSubscribeRepository->model();
        $csr = $csr::where('user_id', $user_id)
            ->where('course_id', $id)
            ->get()
            ->first();

        if (!$csr) {
            $csr = $this->courseSubscribeRepository->create([
                'user_id' => $user_id,
                'course_id' => $id
            ]);
        }

        Flash::success('Course subscribed successfully.');

        return redirect(route('courses.index'));
    }    
}
