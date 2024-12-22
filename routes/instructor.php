<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorController;
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
| Instructor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register instructor routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "instructor" middleware group. Make something great!
|
*/



    //-----------------Instructor Login------------------------
    Route::get('instructor/login',[InstructorController::class,'Index'])->name('login_instructor');
    Route::post('instructor/login/instructor',[InstructorController::class,'Login'])->name('instructor.login');

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){

        //-----------------Instructor Dashboard------------------------
        Route::get('instructor/dashboard',[InstructorController::class,'Dashboard'])->name('instructor.dashboard')->middleware('instructor');
        Route::get('instructor/logout',[InstructorController::class,'InstructorLogout'])->name('instructor.logout')->middleware('instructor');

        //-----------------Instructor Password------------------------
        Route::get('instructor/change/password',[InstructorController::class, 'ChangePassword'])->name('instructor.change.password')->middleware('instructor');
        Route::post('instructor/update/password',[InstructorController::class, 'UpdatePassword'])->name('instructor.update.password')->middleware('instructor');

        //-----------------Instructor Profile------------------------
        Route::get('/instructor/profile',[InstructorController::class, 'Profile'])->name('instructor.profile')->middleware('instructor');
        Route::post('instructor/store/profile',[InstructorController::class, 'StoreProfile'])->name('instructor.store.profile')->middleware('instructor');

        //-----------------Insructor Messages------------------------
        Route::get('/all/inst/stud/mess',[MessageController::class, 'AllInstMessages'])->name('inst.student.messages')->middleware('instructor');
        Route::post('/send/inst/stud/mess',[MessageController::class, 'SendInstStudentMessage'])->name('send.inst.stud.mess')->middleware('instructor');
        Route::post('/edit/inst/stud/mess/{id}',[MessageController::class, 'EditInstStudentMessage'])->name('edit.inst.stud.mess')->middleware('instructor');

        //-----------------Exams List------------------------
        Route::get('inst//my/exams',[ExamController::class, 'ALLInstExams'])->name('inst.myexams')->middleware('instructor');
        Route::post('inst/add/exam',[ExamController::class,'AddInstExam'])->name('add.instexam')->middleware('instructor');
        Route::post('inst/delete/exam/{id}',[ExamController::class, 'DeletePInstExam'])->name('delete.instexam')->middleware('instructor');

         //-----------------Homeworks List------------------------
        Route::get('inst/my/homeworks',[HomeworkController::class, 'InstructorHomeworks'])->name('instructor.homeworks')->middleware('instructor');
        Route::post('inst/add/insthomework',[HomeworkController::class,'AddInstHomework'])->name('add.inst.homework')->middleware('instructor');
        Route::post('inst/delete/insthomework/{id}',[HomeworkController::class, 'DeleteInstHomework'])->name('delete.insthomework')->middleware('instructor');
        Route::get('inst/inst_download_file/{doucment}', [HomeworkController::class, 'DownloadInstAttachment'])->name('download.inst.attachment')->middleware('instructor');

        //-----------------Homeworks Solutions List------------------------
        Route::get('inst/my/shomeworks',[HSolutionController::class, 'InstructorSHomeworks'])->name('instructor.shomeworks')->middleware('instructor');
        Route::get('inst/inst_shomework_file/{doucment}', [HSolutionController::class, 'DownloadSHomework'])->name('download.sshomework')->middleware('instructor');

        //-----------------Books List------------------------
        Route::get('inst/my/books',[BookController::class, 'InstBooks'])->name('instructor.books')->middleware('instructor');
        Route::post('inst/add/book',[BookController::class,'AddInstBook'])->name('add.inst.book')->middleware('instructor');
        Route::get('inst/download_book/{doucment}', [BookController::class, 'DownloadInstBook'])->name('download.inst.book')->middleware('instructor');
        Route::post('inst//delete/book/{id}',[BookController::class, 'DeleteInstBook'])->name('delete.inst.book')->middleware('instructor');

        //-----------------Videos List------------------------
        Route::get('inst/my/videos',[VideoController::class, 'InstVideos'])->name('instructor.videos')->middleware('instructor');
        Route::post('inst/add/video',[VideoController::class,'AddInstVideo'])->name('add.inst.video')->middleware('instructor');
        Route::post('inst//delete/video/{id}',[VideoController::class, 'DeleteInstVideo'])->name('delete.inst.video')->middleware('instructor');

        //-----------------Evaluation List------------------------
        Route::get('inst/evaluation',[EvaluateController::class, 'ALLInstEvaluation'])->name('inst.evaluation')->middleware('instructor');
        Route::post('inst/add/evaluation',[EvaluateController::class,'AddInstEvaluation'])->name('add.evaluation')->middleware('instructor');
        Route::post('inst/delete/evaluation/{id}',[EvaluateController::class, 'DeleteInstEvaluation'])->name('delete.evaluation')->middleware('instructor');

        //-----------------Students List------------------------
        Route::get('inst/students',[InstructorController::class, 'InstStudents'])->name('all.inst.students')->middleware('instructor');
        Route::post('inst/delete/student/{id}',[InstructorController::class, 'DeleteInstStudent'])->name('delete.inst.student')->middleware('instructor');

        //-----------------Podcasts List------------------------
        Route::get('inst/podcasts',[ProdcastController::class, 'InstProdcasts'])->name('instructor.prodcasts')->middleware('instructor');
        Route::post('inst/add/podcast',[ProdcastController::class,'AddInstProdcast'])->name('add.inst.prodcast')->middleware('instructor');
        Route::post('inst/delete/podcast/{id}',[ProdcastController::class, 'DeleteInstProdcast'])->name('delete.inst.prodcast')->middleware('instructor');
    });





require __DIR__.'/auth.php';

