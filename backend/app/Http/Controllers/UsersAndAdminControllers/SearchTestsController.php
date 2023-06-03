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
                ->skip($request->list)->take(10)->get();
        }else{
            $tests = Test::query()
                ->where(function ($query) use ($nameOrUsername) {
                    $query->where('name', 'like', "%$nameOrUsername%")
                        ->orWhereHas('user', function ($query) use ($nameOrUsername) {
                            $query->where('name', 'like', "%$nameOrUsername%");
                        });
                })
                ->with('user:id,name,email')
                ->skip($request->list)->take(10)->get();
        }
        return response()->json($tests);
    }
    public function redirect($id){
        return redirect()->route('startTest.test', $id);
    }
}
