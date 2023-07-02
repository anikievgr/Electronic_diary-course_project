<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainProfileController;
use App\Http\Controllers\UsersAndAdminControllers\TestController;
use App\Http\Controllers\UsersAndAdminControllers\QuestionController;
use App\Http\Controllers\UsersAndAdminControllers\SearchTestsController;
use App\Http\Controllers\UsersAndAdminControllers\StartTestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/test', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function (){
    return redirect()->route('mainProfile.index');
});
Route::middleware('auth')->group(function () {
    Route::resource('/mainProfile', MainProfileController::class);
    Route::post('/mainProfile/updatePassword/{id}', [MainProfileController::class, 'updatePassword'])->name('mainProfile.updatePassword');
    Route::resource('/crudTestPage', TestController::class);
    Route::get('/crudTestPage/delete/{id}', [TestController::class, 'delete'])->name('crudTestPage.delete');
    Route::prefix('/question')->group(function (){
        Route::post('/createQuestion/{id}', [QuestionController::class, 'createAnswer'])->name('question.createQuestion');
        Route::get('/deleteAnswer/{id}', [QuestionController::class, 'deleteAnswer'])->name('question.deleteAnswer');
    });
    Route::prefix('/searchTests')->group(function (){
        Route::get('/index', [SearchTestsController::class, 'index'])->name('searchTests.index');
        Route::post('/redirect/{id}', [SearchTestsController::class, 'redirect']);


    });
    Route::prefix('/startTest')->group(function (){
        Route::get('/test/{id}', [StartTestController::class, 'test'])->name('startTest.test');
        Route::get('/checkAnswer/{id}', [StartTestController::class, 'checkAnswer'])->name('startTest.checkAnswer');
    });




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');//hj
});

require __DIR__.'/auth.php';
