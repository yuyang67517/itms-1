<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobAssignmentController;
use App\Http\Controllers\CrowdControlController;
use App\Http\Controllers\GoodController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/feedback', [FeedbackController::class, 'showForm']);
Route::post('/feedback', [FeedbackController::class, 'store']);
Route::get('/feedback/index', [App\Http\Controllers\FeedbackController::class,'index'])->name('feedback.index');
Route::get('/feedback/filter', [App\Http\Controllers\FeedbackController::class,'filter'])->name('feedback.filter');
Route::patch('/feedback/markAsRead/{feedback}', [App\Http\Controllers\FeedbackController::class,'markAsRead'])->name('feedback.markAsRead');
Route::get('/feedback/{feedback_id}', [App\Http\Controllers\FeedbackController::class,'show'])->name('feedback.show');


Route::get('/profile', [App\Http\Controllers\UserProfileController::class, 'index'])->name('profile');
Route::put('/profile/update', [App\Http\Controllers\UserProfileController::class, 'update'])->name('profile.update');
Route::get('/profile1', 'UserController@index')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/leave', [App\Http\Controllers\LeaveController::class, 'index'])->name('leave.index');
    Route::post('/leave', [App\Http\Controllers\LeaveController::class, 'store'])->name('leave.store');
    Route::get('/leave/{leave_id}', [App\Http\Controllers\LeaveController::class, 'show'])->name('leave.user.show');
    Route::put('/leave/{leave_id}', [App\Http\Controllers\LeaveController::class, 'update'])->name('leave.update');
    // Route::get('/leave/{id}', 'LeaveController@showUserLeave')->name('leave.user.show');
    //Route::get('/test', 'LeaveController@userLeaveHistory')->name('leave.user.history');
    //Route::get('/leave/history', [LeaveController::class, 'history'])->name('leave.history');
    Route::get('/test', [LeaveController::class, 'test']);
    Route::get('/leave/history', [LeaveController::class, 'userLeaveHistory'])->name('leave.history');
    Route::get('/leave/all', [App\Http\Controllers\LeaveController::class, 'allLeave'])->name('leave.all');

   
    
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/admin/leave/index', 'AdminController@index')->name('admin.leave.index');
    Route::put('/admin/leave/{id}/approve', 'AdminController@approveLeave')->name('admin.leave.approve');
    Route::put('/admin/leave/{id}/reject', 'AdminController@rejectLeave')->name('admin.leave.reject');
    Route::get('/admin/leave/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.leave.index');
    
});


Route::resource('positions', PositionController::class);
Route::resource('timetables', TimetableController::class);
Route::get('/timetables/manual', 'TimetableController@manual')->name('timetables.manual');
Route::post('timetables/generate', 'TimetableController@generate')->name('timetables.generate');

Route::get('/admin/create-job', [App\Http\Controllers\AdminController::class, 'createJob'])->name('admin.create-job');
Route::post('/admin/store-job', [App\Http\Controllers\AdminController::class, 'storeJob'])->name('admin.store-job');

Route::get('/admin/assign-jobs', [App\Http\Controllers\AdminController::class, 'assignJobs'])->name('admin.assign-jobs');
Route::post('/admin/store-assignment', [App\Http\Controllers\AdminController::class, 'storeAssignment'])->name('admin.store-assignment');
Route::get('/user/assigned-jobs', 'UserController@assignedJobs');

// Route::get('/assigned-jobs', 'JobAssignmentController@index')->name('assigned-jobs.index');
Route::get('/assigned-jobs', [App\Http\Controllers\JobAssignmentController::class,'index'])->name('assigned-jobs.index');

Route::get('/crowd-control', [App\Http\Controllers\CrowdControlController::class,'index'])->name('crowd-control.index');
Route::post('/crowd-control', [App\Http\Controllers\CrowdControlController::class,'store'])->name('crowd-control.store');
Route::get('/fullscreen', [App\Http\Controllers\CrowdControlController::class,'displayFullscreen'])->name('fullscreen');


Route::resource('goods', GoodController::class);
Route::get('/admin/leave/index', [App\Http\Controllers\AdminController::class, 'viewLeaveApplications'])->name('admin.leave.index');
    
    




