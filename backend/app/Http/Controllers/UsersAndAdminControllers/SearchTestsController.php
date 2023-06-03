<?php

namespace App\Http\Controllers\UsersAndAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class SearchTestsController extends Controller
{
    public function index(){

        return view('main/tests/searchTests' );
    }

    public function searchTest(Request $request){
        $nameOrUsername = $request->search;
        if ($nameOrUsername == 'all'){
            $tests = Test::query()->with(['user' => function($q)
                {
                    $q->select('id', 'name', 'email');
                }])
                ->get();
        }else{
            $tests = Test::query()
                ->where(function ($query) use ($nameOrUsername) {
                    $query->where('name', 'like', "%$nameOrUsername%")
                        ->orWhereHas('user', function ($query) use ($nameOrUsername) {
                            $query->where('name', 'like', "%$nameOrUsername%");
                        });
                })
                ->with('user:id,name,email')
                ->get();
        }
        return response()->json($tests);
    }
}
