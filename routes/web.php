<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', function () {
  echo 'sss';
});

use App\Models\User;
Route::get('/users', function () {
   $users = User::get();
   foreach($users as $key => $user)
   {
       echo ($key+1).' - '.$user->name.'<br>';
   }
});
//Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('take-exam');

Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('exam-login');
Route::post('/attempt-login', [App\Http\Controllers\HomeController::class, 'attemptLogin'])->name('attempt-login');
Route::get('/exam', [App\Http\Controllers\HomeController::class, 'exam'])->name('take-exam');
Route::post('/submit-exam', [App\Http\Controllers\HomeController::class, 'submitExam']);


#Teacher routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/print-user', [App\Http\Controllers\HomeController::class, 'printUser']);

Route::get('/subject-overview', [App\Http\Controllers\HomeController::class, 'overview']);
Route::get('/attempts', [App\Http\Controllers\HomeController::class, 'attempts']);
Route::get('/evaluation', [App\Http\Controllers\HomeController::class, 'evaluation']);
Route::post('/update-evaluation', [App\Http\Controllers\HomeController::class, 'updateEvaluation']);

Route::get('/welcome', function () {
  //dd('s');
    return view('welcome');
});


Route::post('/save-calculator', [App\Http\Controllers\HomeController::class, 'saveCalculator']);
Route::post('/save-questiontime', [App\Http\Controllers\HomeController::class, 'saveQuestiontime']);
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');

Route::get('/student-overview', [App\Http\Controllers\HomeController::class, 'studentoverview']);
Route::get('/digital-exam', [App\Http\Controllers\HomeController::class, 'digitalExam']);
Route::post('/save-digital-exam', [App\Http\Controllers\HomeController::class, 'saveDigitalExam']);
Auth::routes();
