<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Repositories\LessonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Course;
use App\Models\Answer;
use App\Models\Lesson;
use Flash;
use Response;
use Auth;

class LessonController extends AppBaseController
{
    /** @var  LessonRepository */
    private $lessonRepository;

    public function __construct(LessonRepository $lessonRepo)
    {
        $this->lessonRepository = $lessonRepo;
    }

    /**
     * Display a listing of the Lesson.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lessons = $this->lessonRepository->allQuery();
        if ($request->input('course_id')) {
            $lessons = $lessons->where('course_id', $request->input('course_id'));
        }
        $lessons = $lessons->paginate(10);

        return view('lessons.index')
            ->with('lessons', $lessons);
    }

    /**
     * Show the form for creating a new Lesson.
     *
     * @return Response
     */
    public function create()
    {
        $c = Course::get()->all();
        $courseList = collect($c)->pluck('name', 'id')->all();
        return view('lessons.create')
        ->with('courseList', $courseList);
    }

    /**
     * Store a newly created Lesson in storage.
     *
     * @param CreateLessonRequest $request
     *
     * @return Response
     */
    public function store(CreateLessonRequest $request)
    {
        $input = $request->all();

        $lesson = $this->lessonRepository->create($input);

        Flash::success('Lesson saved successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Display the specified Lesson.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');
            return redirect(route('lessons.index'));
        }
        $a = Answer::where('lesson_id', $id)->get()->all();        
        $qids = collect($a)->pluck('answer', 'question_id')->all();

        $questions = Question::where('lesson_id', $id)->get()->all();

        $lessonFinished = count($questions) > 0 && count($questions) == count($qids) ? true : false;

        $correctAnswerCounter = 0;
        foreach($questions as $q) {
            if (isset($qids[$q->id]) &&  $q->answer == $qids[$q->id]) {
                ++$correctAnswerCounter;
            }
        }

        return view('lessons.show')->with('lesson', $lesson)
        ->with('questions', $questions)
        ->with('qids', $qids)
        ->with('lessonFinished', $lessonFinished)
        ->with('correctAnswerCounter', $correctAnswerCounter)
        ;
    }

    /**
     * Show the form for editing the specified Lesson.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $c = Course::get()->all();
        $courseList = collect($c)->pluck('name', 'id')->all();
        return view('lessons.edit')->with('lesson', $lesson)
        ->with('courseList', $courseList);
    }

    /**
     * Update the specified Lesson in storage.
     *
     * @param int $id
     * @param UpdateLessonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLessonRequest $request)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $lesson = $this->lessonRepository->update($request->all(), $id);

        Flash::success('Lesson updated successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Remove the specified Lesson from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $this->lessonRepository->delete($id);

        Flash::success('Lesson deleted successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Save answers for this questions.
     *
     * @param int $lesson_id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function saveAnswer($lesson_id, Request $request)
    {
        $lesson = $this->lessonRepository->find($lesson_id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');
            return redirect(route('lessons.show', [$lesson_id]) . '?course_id='. $request->input('course_id') );
        }
        $user_id = Auth::user()->id;
        $submittedAnswers = $request->input('question');

        $questions = Answer::where('lesson_id', $lesson_id)->get()->all();        
        $qids = collect($questions)->pluck('question_id')->all();  

        foreach($submittedAnswers ?? [] as $qId => $ans) {
            if (in_array($qId, $qids)) {
                $ansModel = Answer::where('question_id', $qId)->get()->first();
            } else {
                $ansModel = new Answer;
            }

            $ansModel->fill([
                'user_id' => $user_id,
                'lesson_id' => $lesson_id,
                'question_id' => $qId,
                'answer' => $ans,
                'answer_at' => date('Y-m-d H:i:s')
            ]);
            $ansModel->save();
        }

        Flash::success('Thanks for submitting answer.');
        return redirect(route('lessons.show', [$lesson_id]) . '?course_id='. $request->input('course_id') );
    }

    /**
     * Render response html input select option.
     *
     * @param int $course_id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function lhsofCourse($course_id, Request $request)
    {
        $l = Lesson::where('course_id', $course_id)->get()->all();        
        $llist = collect($l)->pluck('name', 'id')->all();  

        foreach($llist ?? [] as $id => $l) {
            echo '<option value="'.$id.'">' .  $l . '</option>';
        }
    }
}
