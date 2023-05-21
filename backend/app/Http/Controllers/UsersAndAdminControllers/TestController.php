<?php

namespace App\Http\Controllers\UsersAndAdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\TestBasicDataRequest;
use App\Models\Answer;
use App\Models\CorrectAnswers;
use App\Models\Questions;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = User::with(['tests'])->get();
        return view('main/tests/index' , compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::with(['tests.questions'])
            ->with(['tests.questions.correctAnswers', 'tests.questions.answers'])
            ->get();
        return view('main/tests/create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestBasicDataRequest $request)
    {
        $userId = auth()->id();

        $test = Test::create([
            'name' => $request->name,
            'time' => $request->time,
            'user_id' => $userId,
        ]);
        $test = $test->id;

        return redirect()->route('crudTestPage.show', $test);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::where('id', $id)->with(['questions.answers.correctAnswer'])->get();
        return view('main/tests/update', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
    /**
     * create question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createQuestion(QuestionRequest $request, $id)
    {

        $questions = Questions::create([
            'questions'=> $request->questions,
            'test_id'=> $id,
        ]);
        $answer [0] = Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->firstAnswer,
        ]);
        $answer [1] = Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->secondAnswer,
        ]);
        $answer [2] = Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->thirdAnswer,
        ]);
        $answer [3] = Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->fourthAnswer,
        ]);
        $answers = array_keys($request->all(), 'on');
        foreach ($answers as $item){
            switch ($item) {
                case 'firstAnswerCheckbox':
                    CorrectAnswers::create([
                        'questions_id' => $questions->id,
                        'answer_id' => $answer[0]->id,
                    ]);
                    break;
                case 'secondAnswerCheckbox':
                    CorrectAnswers::create([
                        'questions_id' => $questions->id,
                        'answer_id' => $answer[1]->id,
                    ]);
                    break;
                case 'thirdAnswerCheckbox':
                    CorrectAnswers::create([
                        'questions_id' => $questions->id,
                        'answer_id' => $answer[2]->id,
                    ]);
                    break;
                case 'fourthAnswerCheckbox':
                    CorrectAnswers::create([
                        'questions_id' => $questions->id,
                        'answer_id' => $answer[3]->id,
                    ]);
                    break;
            }
        }
        $test = Test::where('id', $id)->with(['questions.answers.correctAnswer'])->get();
        return redirect()->route('crudTestPage.show', $test[0]->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
