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
}
