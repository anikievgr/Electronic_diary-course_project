<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestBasicDataRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'questions'=> 'required',
            'firstAnswer'=> 'required',
            'secondAnswer'=> 'required',
            'thirdAnswer'=> 'required',
            'fourthAnswer'=> 'required',
            'firstAnswerCheckbox' => 'required_without_all:secondAnswerCheckbox,thirdAnswerCheckbox,fourthAnswerCheckbox',
            'secondAnswerCheckbox' => 'required_without_all:firstAnswerCheckbox,thirdAnswerCheckbox,fourthAnswerCheckbox',
            'thirdAnswerCheckbox' => 'required_without_all:firstAnswerCheckbox,secondAnswerCheckbox,fourthAnswerCheckbox',
            'fourthAnswerCheckbox' => 'required_without_all:firstAnswerCheckbox,secondAnswerCheckbox,thirdAnswerCheckbox',
        ];
    }
}
