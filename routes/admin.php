<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\EvaluateController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProdcastController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/



    //-----------------Admin Login------------------------
    Route::get('admin/login',[AdminController::class,'Index'])->name('admin_form');
    Route::post('admin/login/admin',[AdminController::class,'Login'])->name('admin.login');

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){

        //-----------------Admin Dashboard------------------------
        Route::get('admin/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware('admin');
        Route::get('admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('admin');

        //-----------------Admin Password------------------------
        Route::get('admin/change/password',[AdminController::class, 'ChangePassword'])->name('change.password')->middleware('admin');
        Route::post('admin/update/password',[AdminController::class, 'UpdatePassword'])->name('update.password')->middleware('admin');

        //-----------------Admin Profile------------------------
        Route::get('/admin/profile',[AdminController::class, 'Profile'])->name('admin.profile')->middleware('admin');
        Route::post('admin/store/profile',[AdminController::class, 'StoreProfile'])->name('store.profile')->middleware('admin');

        //-----------------Admin List------------------------
        Route::get('admin/all/admins',[AdminController::class, 'AllAdmins'])->name('all.admins')->middleware('admin');
        Route::post('admin/delete/admin/{id}',[AdminController::class, 'DeleteAdmin'])->name('delete.admin')->middleware('admin');
        Route::post('admin/add/admin',[AdminController::class,'AddAdmin'])->name('add.admin')->middleware('admin');

        //-----------------Instructors List------------------------
        Route::get('admin/all/inst',[AdminController::class, 'AllInst'])->name('all.inst')->middleware('admin');
        Route::post('admin/delete/inst/{id}',[AdminController::class, 'DeleteInst'])->name('delete.inst')->middleware('admin');
        Route::post('admin/add/inst',[AdminController::class,'AddInst'])->name('add.inst')->middleware('admin');

        //-----------------Students List------------------------
        Route::get('admin/all/students',[AdminController::class, 'AllStudents'])->name('all.students')->middleware('admin');
        Route::post('admin/delete/student/{id}',[AdminController::class, 'DeleteStudent'])->name('delete.student')->middleware('admin');

        //-----------------Messages List------------------------
        Route::get('admin/all/messages',[MessageController::class, 'AllMessages'])->name('all.messages')->middleware('admin');

        //-----------------Subjects List------------------------
        Route::resource('Subject', SubjectController::class)->middleware('admin');

        //-----------------Exams List------------------------
        Route::get('admin/all/exams',[ExamController::class, 'AllExams'])->name('all.exams')->middleware('admin');
        Route::post('admin/add/exam',[ExamController::class,'AddExam'])->name('add.exam')->middleware('admin');
        Route::post('admin/delete/exam/{id}',[ExamController::class, 'DeleteExam'])->name('delete.exam')->middleware('admin');

        //-----------------Homeworks List------------------------
        Route::get('admin/all/homeworks',[HomeworkController::class, 'AllHomeworks'])->name('all.homeworks')->middleware('admin');
        Route::post('admin/add/homework',[HomeworkController::class,'AddHomework'])->name('add.homework')->middleware('admin');
        Route::post('admin/delete/homework/{id}',[HomeworkController::class, 'DeleteHomework'])->name('delete.homework')->middleware('admin');
        Route::get('/admindownload_file/{doucment}', [HomeworkController::class, 'DownloadAttachment'])->name('downloadAttachment')->middleware('admin');

        //-----------------Evaluations List------------------------
        Route::get('admin/all/evaluations',[EvaluateController::class, 'AllEvaluations'])->name('all.evaluations')->middleware('admin');
        Route::post('admin/delete/evaluation/{id}',[EvaluateController::class, 'DeleteEvaluation'])->name('delete.stud_evaluation')->middleware('admin');

        //-----------------Material Books List------------------------
        Route::get('admin/all/books',[BookController::class, 'AllBooks'])->name('all.books')->middleware('admin');
        Route::get('admin/download_book/{doucment}', [BookController::class, 'DownloadBook'])->name('download.book')->middleware('admin');


        //-----------------Material Videos List------------------------
        Route::get('admin/all/videos',[VideoController::class, 'AllVideos'])->name('all.videos')->middleware('admin');

        //-----------------Podcasts List------------------------
        Route::get('admin/podcasts',[ProdcastController::class, 'AdminProdcasts'])->name('admin.podcasts')->middleware('admin');
    });





require __DIR__.'/auth.php';

