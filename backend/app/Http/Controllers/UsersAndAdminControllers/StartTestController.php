<?php

namespace App\Http\Controllers\UsersAndAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class StartTestController extends Controller
{
    public function test($id){
        $test = Test::whereId($id)->with('questions.answers')->get();
        return view('main/tests/test', compact('test'));

    }
    public function checkAnswer(Request $request, $id){
        $test = Test::whereId($id)->with('questions.answers')->get();

        $numberCorrectUserResponses = 0;
        $numberCorrectAnswers = 0;
        foreach ($test as $key => $itemTest){
            foreach ($itemTest->questions as $question){
                foreach ($question->answers as $answer){
                    if ($answer->correct_answer){
                        $numberCorrectAnswers = $numberCorrectAnswers + 1;
                    }
                    $itemArrayRequest = 'q'.$answer->questions_id.'a'.$answer->id;
                    if ($request[$itemArrayRequest] == 'on' &&  $answer->correct_answer){
                        $numberCorrectUserResponses = $numberCorrectUserResponses + 1;
                    }

                }

            }
        }
        $numberCorrectUserResponses = (100*$numberCorrectUserResponses)/$numberCorrectAnswers;
    }
}
