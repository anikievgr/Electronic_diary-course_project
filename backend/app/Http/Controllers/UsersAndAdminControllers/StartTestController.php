<?php

namespace App\Http\Controllers\UsersAndAdminControllers;

use App\Http\Controllers\Controller;
use App\Mail\TestResult;
use App\Models\CorrectAnswersUser;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StartTestController extends Controller
{
    public function test($id){
        $test = Test::whereId($id)->with('questions.answers')->get();
        return view('main/tests/test', compact('test'));

    }
    public function checkAnswer(Request $request, $id){
        $test = Test::whereId($id)->with('questions.answers', 'user')->get();

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
        CorrectAnswersUser::create([
            'user_id' => auth()->id(),
            'percentage' => $numberCorrectUserResponses,
            'test_id' => $test[0]->id
        ]);

        $user=[
            'nameUser' => auth()->user()->name,
            'emailUser' => auth()->user()->email,
            'result' => $numberCorrectUserResponses,
        ];
        Mail::to($test[0]->user->email)->send(new TestResult($user));
        return view('main/tests/result', compact('numberCorrectUserResponses'));
    }
}
