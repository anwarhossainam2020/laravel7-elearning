<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Repositories\AnswerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AnswerController extends AppBaseController
{
    /** @var  AnswerRepository */
    private $answerRepository;

    public function __construct(AnswerRepository $answerRepo)
    {
        $this->answerRepository = $answerRepo;
    }

    /**
     * Display a listing of the Answer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $answers = $this->answerRepository->paginate(10);

        return view('answers.index')
            ->with('answers', $answers);
    }

    /**
     * Show the form for creating a new Answer.
     *
     * @return Response
     */
    public function create()
    {
        return view('answers.create');
    }

    /**
     * Store a newly created Answer in storage.
     *
     * @param CreateAnswerRequest $request
     *
     * @return Response
     */
    public function store(CreateAnswerRequest $request)
    {
        $input = $request->all();

        $answer = $this->answerRepository->create($input);

        Flash::success('Answer saved successfully.');

        return redirect(route('answers.index'));
    }

    /**
     * Display the specified Answer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $answer = $this->answerRepository->find($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('answers.index'));
        }

        return view('answers.show')->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified Answer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $answer = $this->answerRepository->find($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('answers.index'));
        }

        return view('answers.edit')->with('answer', $answer);
    }

    /**
     * Update the specified Answer in storage.
     *
     * @param int $id
     * @param UpdateAnswerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnswerRequest $request)
    {
        $answer = $this->answerRepository->find($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('answers.index'));
        }

        $answer = $this->answerRepository->update($request->all(), $id);

        Flash::success('Answer updated successfully.');

        return redirect(route('answers.index'));
    }

    /**
     * Remove the specified Answer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $answer = $this->answerRepository->find($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('answers.index'));
        }

        $this->answerRepository->delete($id);

        Flash::success('Answer deleted successfully.');

        return redirect(route('answers.index'));
    }
}
