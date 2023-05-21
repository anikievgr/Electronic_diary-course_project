<?php

namespace App\Http\Controllers\UsersAndAdminControllers;

use App\Http\Controllers\Controller;
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

        return view('main/tests/index');
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
        dd($user);
        return view('main/tests/create');
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

        $test = Test::updateOrCreate([
            'name' => $request->name,
            'time' => $request->time,
            'user_id' => $userId,
        ]);
        $questions = Questions::updateOrCreate([
            'questions'=> $request->questions,
            'test_id'=> $test->id,
        ]);
        Answer::updateOrCreate([
            'questions_id' => $questions->id,
            'answer' => $request->firstAnswer,
        ]);
        Answer::updateOrCreate([
            'questions_id' => $questions->id,
            'answer' => $request->secondAnswer,
        ]);
        Answer::updateOrCreate([
            'questions_id' => $questions->id,
            'answer' => $request->thirdAnswer,
        ]);
        Answer::updateOrCreate([
            'questions_id' => $questions->id,
            'answer' => $request->fourthAnswer,
        ]);
        foreach ($request->all() as $key => $item){
            if ($item == 'on'){
                CorrectAnswers::updateOrCreate([
                    'questions_id' => $questions->id,
                    'correct_answer' => $key,
                ]);
            }
        }
        $answer = array_keys($request->all(), 'on');
        foreach ($answer as $item){
            if ($item == 'fourthAnswerCheckbox' || $item == 'thirdAnswerCheckbox'|| $item == 'secondAnswerCheckbox'|| $item == 'firstAnswerCheckbox'){
                CorrectAnswers::updateOrCreate([
                    'questions_id' => $questions->id,
                    'correct_answer' => $key,
                ]);
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
