<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseSubscribeRequest;
use App\Http\Requests\UpdateCourseSubscribeRequest;
use App\Repositories\CourseSubscribeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CourseSubscribeController extends AppBaseController
{
    /** @var  CourseSubscribeRepository */
    private $courseSubscribeRepository;

    public function __construct(CourseSubscribeRepository $courseSubscribeRepo)
    {
        $this->courseSubscribeRepository = $courseSubscribeRepo;
    }

    /**
     * Display a listing of the CourseSubscribe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $courseSubscribes = $this->courseSubscribeRepository->paginate(10);

        return view('course_subscribes.index')
            ->with('courseSubscribes', $courseSubscribes);
    }

    /**
     * Show the form for creating a new CourseSubscribe.
     *
     * @return Response
     */
    public function create()
    {
        return view('course_subscribes.create');
    }

    /**
     * Store a newly created CourseSubscribe in storage.
     *
     * @param CreateCourseSubscribeRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseSubscribeRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $courseSubscribe = $this->courseSubscribeRepository->create($input);

        Flash::success('Course Subscribe saved successfully.');

        return redirect(route('courseSubscribes.index'));
    }

    /**
     * Display the specified CourseSubscribe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courseSubscribe = $this->courseSubscribeRepository->find($id);

        if (empty($courseSubscribe)) {
            Flash::error('Course Subscribe not found');

            return redirect(route('courseSubscribes.index'));
        }

        return view('course_subscribes.show')->with('courseSubscribe', $courseSubscribe);
    }

    /**
     * Show the form for editing the specified CourseSubscribe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courseSubscribe = $this->courseSubscribeRepository->find($id);

        if (empty($courseSubscribe)) {
            Flash::error('Course Subscribe not found');

            return redirect(route('courseSubscribes.index'));
        }

        return view('course_subscribes.edit')->with('courseSubscribe', $courseSubscribe);
    }

    /**
     * Update the specified CourseSubscribe in storage.
     *
     * @param int $id
     * @param UpdateCourseSubscribeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseSubscribeRequest $request)
    {
        $courseSubscribe = $this->courseSubscribeRepository->find($id);

        if (empty($courseSubscribe)) {
            Flash::error('Course Subscribe not found');

            return redirect(route('courseSubscribes.index'));
        }

        $courseSubscribe = $this->courseSubscribeRepository->update($request->all(), $id);

        Flash::success('Course Subscribe updated successfully.');

        return redirect(route('courseSubscribes.index'));
    }

    /**
     * Remove the specified CourseSubscribe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courseSubscribe = $this->courseSubscribeRepository->find($id);

        if (empty($courseSubscribe)) {
            Flash::error('Course Subscribe not found');

            return redirect(route('courseSubscribes.index'));
        }

        $this->courseSubscribeRepository->delete($id);

        Flash::success('Course Subscribe deleted successfully.');

        return redirect(route('courseSubscribes.index'));
    }
}
