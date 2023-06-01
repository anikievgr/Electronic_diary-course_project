<?php

namespace App\Http\Controllers\UsersAndAdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Questions;
use App\Models\Test;

class QuestionController extends Controller
{
    public function createAnswer(QuestionRequest $request, $id)
    {
        $questions = Questions::create([
            'questions'=> $request->questions,
            'test_id'=> $id,
        ]);
        Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->firstAnswer,
            'correct_answer' => ($request->firstAnswerCheckbox ? true : false),
        ]);
        Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->secondAnswer,
            'correct_answer' => ($request->secondAnswerCheckbox ? true : false),
        ]);
        Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->thirdAnswer,
            'correct_answer' => ($request->thirdAnswerCheckbox ? true : false),
        ]);
        Answer::create([
            'questions_id' => $questions->id,
            'answer' => $request->fourthAnswer,
            'correct_answer' => ($request->fourthAnswerCheckbox ? true : false),
        ]);
        $test = Test::where('id', $id)->with(['questions.answers'])->get();
        return redirect()->route('crudTestPage.show', $test[0]->id);
    }

    public function deleteAnswer($id){
        $q = Questions::find($id);
        $q->answers()->delete();
        $q->delete();
        return redirect()->back();
    }
}
