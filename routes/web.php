<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HSolutionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\EvaluateController;
use App\Http\Controllers\ProdcastController;

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

Route::get('/', function () { return view('auth.login'); });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    //-----------------Student Dashboard------------------------
    Route::get('/dashboard', function () {
        return view('student.dashboard'); })->middleware(['verified'])->name('dashboard')->middleware('student');
    Route::get('student/logout',[StudentController::class,'StudentLogout'])->name('student.logout');

    //-----------------Student Profile------------------------
    Route::get('/profile',[StudentController::class, 'Profile'])->name('student.profile')->middleware('student');
    Route::post('/store/profile',[StudentController::class, 'StoreProfile'])->name('student.store.profile')->middleware('student');

    //-----------------Student Password------------------------
    Route::get('/change/password',[StudentController::class, 'ChangePassword'])->name('student.change.password')->middleware('student');
    Route::post('/update/password',[StudentController::class, 'UpdatePassword'])->name('student.update.password')->middleware('student');

    //-----------------Instructor Messages------------------------
    Route::get('/all/stud/inst/mess',[MessageController::class, 'AllStudInstMessages'])->name('student.instructor.messages')->middleware('student');
    Route::post('/send/stud/inst/mess',[MessageController::class, 'SendStudInstMessage'])->name('send.stud.inst.mess')->middleware('student');
    Route::post('/edit/stud/inst/mess/{id}',[MessageController::class, 'EditStudInstMessage'])->name('edit.stud.inst.mess')->middleware('student');

    //-----------------Exam -------------------------------------
    Route::get('/exams',[ExamController::class, 'StudentExam'])->name('stud.exams')->middleware('student');

    //-----------------Homeworks -------------------------------------
    Route::get('/homeworks',[HomeworkController::class, 'StudentHomework'])->name('stud.homeworks')->middleware('student');
    Route::get('student_download_file/{doucment}', [HomeworkController::class, 'DownloadStudAttachment'])->name('download.student.attachment')->middleware('student');
    //Route::post('/add/homework/file/{id}',[HomeworkController::class, 'AddHomeworkFile'])->name('add.homework.solution');

    //-----------------Upload solution------------------------
    Route::get('/my_h_solutions',[HSolutionController::class, 'MyHomeworkSolutions'])->name('my.homeworks.solutions')->middleware('student');
    Route::post('/add/shomework',[HSolutionController::class,'AddSHomework'])->name('add.shomework')->middleware('student');
    Route::get('download_s/{doucment}', [HSolutionController::class, 'DownloadSAttachment'])->name('download.shomework')->middleware('student');

    //-----------------books -------------------------------------
    Route::get('/book',[BookController::class, 'StudentBook'])->name('stud.books')->middleware('student');
    Route::get('student_download_book/{doucment}', [BookController::class, 'DownloadStudBook'])->name('download.student.book')->middleware('student');

    //-----------------Videos -------------------------------------
    Route::get('/videos',[VideoController::class, 'StudentVideos'])->name('stud.videos')->middleware('student');
    //Route::get('student_download_book/{doucment}', [BookController::class, 'DownloadStudBook'])->name('download.student.book');

    //-----------------Evaluation -------------------------------------
    Route::get('my/evaluations',[EvaluateController::class, 'StudentEvaluations'])->name('stud.evaluations')->middleware('student');

    //-----------------Podcasts List------------------------
    Route::get('podcasts',[ProdcastController::class, 'StuProdcasts'])->name('students.podcasts')->middleware('student');
});





require __DIR__.'/auth.php';
