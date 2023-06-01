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
        $test = Test::where('id', $id)->with(['questions.answers'])->get();
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
