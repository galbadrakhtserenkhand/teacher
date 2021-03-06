<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\TeacherAuthController;

use App\Http\Controllers\Teacher\TeacherController;

use App\Http\Controllers\Teacher\TeachersController;
use App\Http\Controllers\Teacher\StudentsController;
use App\Http\Controllers\Teacher\AngiController;
use App\Http\Controllers\Teacher\HicheelController;
use App\Http\Controllers\Teacher\HuvaariController;
use App\Http\Controllers\Teacher\MergejilController;
use App\Http\Controllers\Teacher\MergejilBagshController;
use App\Http\Controllers\Teacher\TenhimController;
use App\Http\Controllers\Teacher\SettingsController;
use App\Http\Controllers\Teacher\FondController;
use App\Http\Controllers\Teacher\IrtsController;
use App\Http\Controllers\Teacher\YavtsController;
use App\Http\Controllers\Teacher\EschoolController;
use App\Http\Controllers\Teacher\AguulgaController;
use App\Http\Controllers\Teacher\EventController;
use App\Http\Controllers\teacher\ShalgaltController;
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

Auth::routes();

/****************************************************************************/
/********************************** TEACHER *********************************/
/****************************************************************************/

// Teacher Login
Route::get('teacher', [TeacherAuthController::class, 'teacherGet'])->name('teacherLogin');
Route::get('teacher/login', [TeacherAuthController::class, 'teacherGetLogin'])->name('teacherLogin');
Route::post('teacher/login', [TeacherAuthController::class, 'teacherLogin'])->name('teacherLoginPost');
Route::get('teacher/logout', [TeacherAuthController::class, 'teacherLogout'])->name('logout');

Route::group(['prefix' => 'teacher','middleware' => 'teacherauth'], function () {
	// teacher Dashboard
	Route::get('dashboard',[TeacherController::class, 'dashboard'])->name('teacher-dashboard');	
	
	// Teacher
	Route::get('teachers',[TeachersController::class, 'index'])->name('teacher-teachers');
	Route::get('teachers/add',[TeachersController::class, 'add'])->name('teacher-teachers-add');
	Route::get('teachers/edit/{id}',[TeachersController::class, 'edit'])->name('teachers-edit');

	Route::post('teachers/add',[TeachersController::class, 'store'])->name('teacher-teachers-save');
	Route::post('teachers/edit/{id}',[TeachersController::class, 'update'])->name('teacher-teachers-edit');
	Route::post('teachers/delete/',[TeachersController::class, 'delete'])->name('teacher-teachers-delete-ajax');

	Route::delete('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('teacher-teachers-delete');

	// Angi
	Route::get('angiud',[AngiController::class, 'index'])->name('teacher-angi');
	Route::get('angi_students',[AngiController::class, 'students'])->name('teacher-angi-students');
	Route::get('angi_huvaari',[AngiController::class, 'huvaari'])->name('teacher-angi-huvaari');
	Route::get('angi_irts',[AngiController::class, 'irts'])->name('teacher-angi-irts');
	Route::get('angi_yavts',[AngiController::class, 'yavts'])->name('teacher-angi-yavts');

	// Fond
	Route::get('fond',[FondController::class, 'index'])->name('teacher-fond');

	// Irts
	Route::get('irts',[IrtsController::class, 'index'])->name('teacher-irts');

	// Yavts
	Route::get('yavts',[YavtsController::class, 'index'])->name('teacher-yavts');

	// Mergejil
	Route::get('mergejil',[MergejilController::class, 'index'])->name('teacher-mergejil');
	Route::get('mergejil/add',[MergejilController::class, 'add'])->name('teacher-mergejil-add');
	Route::get('mergejil/edit/{id}',[MergejilController::class, 'edit'])->name('mergejil-edit');

	Route::post('mergejil/add',[MergejilController::class, 'store'])->name('teacher-mergejil-save');
	Route::post('mergejil/edit/{id}',[MergejilController::class, 'update'])->name('teacher-mergejil-edit');
	Route::post('mergejil/delete/',[MergejilController::class, 'delete'])->name('teacher-mergejil-delete-ajax');

	Route::delete('mergejil/delete/{id}',[MergejilController::class, 'destroy'])->name('teacher-mergejil-delete');

	// Mergejil Bagsh
	Route::get('mergejil_bagsh',[MergejilBagshController::class, 'index'])->name('teacher-mergejil_bagsh');
	Route::get('mergejil_bagsh/add',[MergejilBagshController::class, 'add'])->name('teacher-mergejil_bagsh-add');
	Route::get('mergejil_bagsh/edit/{id}',[MergejilBagshController::class, 'edit'])->name('mergejil_bagsh-edit');

	Route::post('mergejil_bagsh/add',[MergejilBagshController::class, 'store'])->name('teacher-mergejil_bagsh-save');
	Route::post('mergejil_bagsh/edit/{id}',[MergejilBagshController::class, 'update'])->name('teacher-mergejil_bagsh-edit');

	Route::delete('mergejil_bagsh/delete/{id}',[MergejilBagshController::class, 'destroy'])->name('teacher-mergejil_bagsh-delete');

	// Tenhim
	Route::get('tenhim',[TenhimController::class, 'index'])->name('teacher-tenhim');

	// Hicheel
	Route::get('hicheel',[HicheelController::class, 'index'])->name('teacher-hicheel');
	Route::get('hicheel/add',[HicheelController::class, 'add'])->name('teacher-hicheel-add');
	Route::get('hicheel/edit/{id}',[HicheelController::class, 'edit'])->name('hicheel-edit');

	Route::post('hicheel/add',[HicheelController::class, 'store'])->name('teacher-hicheel-save');
	Route::post('hicheel/edit/{id}',[HicheelController::class, 'update'])->name('teacher-hicheel-edit');
	Route::post('hicheel/delete/',[HicheelController::class, 'delete'])->name('teacher-hicheel-delete-ajax');

	Route::delete('hicheel/delete/{id}',[HicheelController::class, 'destroy'])->name('teacher-hicheel-delete');

	// Shalgalt
	Route::get('shalgalt',[ShalgaltController::class, 'index'])->name('teacher-shalgalt');
	Route::get('shalgalt/add',[ShalgaltController::class, 'add'])->name('teacher-shalgalt-add');
	Route::get('shalgalt/asuult/{id}',[ShalgaltController::class, 'asuult'])->name('teacher-shalgalt-asuult');
	Route::get('shalgalt/asuult/{id}/add',[ShalgaltController::class, 'asuult_add'])->name('teacher-shalgalt-asuult-add');

	Route::post('shalgalt/shalgalt/delete/',[ShalgaltController::class, 'shalgalt_delete'])->name('teacher-shalgalt-delete-ajax');
	Route::post('shalgalt/add',[ShalgaltController::class, 'store'])->name('teacher-shalgalt-save');
	Route::post('shalgalt/asuult/{id}/add',[ShalgaltController::class, 'asuult_store'])->name('teacher-shalgalt-asuult-save');
	Route::post('shalgalt/asuult/delete/',[ShalgaltController::class, 'asuult_delete'])->name('teacher-shalgalt-asuult-delete-ajax');

	// Huvaari
	Route::get('huvaari',[HuvaariController::class, 'index'])->name('teacher-huvaari');
	Route::get('huvaari/bagsh/{bagshId}',[HuvaariController::class, 'bagsh'])->name('teacher-huvaari-bagsh');

	// Students
	Route::get('students',[StudentsController::class, 'index'])->name('teacher-students');
	Route::get('students/add',[StudentsController::class, 'add'])->name('teacher-students-add');
	Route::get('students/edit/{id}',[StudentsController::class, 'edit'])->name('students-edit');

	Route::post('students/add',[StudentsController::class, 'store'])->name('teacher-students-save');
	Route::post('students/edit/{id}',[StudentsController::class, 'update'])->name('teacher-students-edit');
	Route::post('students/delete/',[StudentsController::class, 'delete'])->name('teacher-students-delete-ajax');

	// Eschool
	Route::get('eschool',[EschoolController::class, 'index'])->name('teacher-eschool');
	Route::get('eschool/{slug}/sedevs',[EschoolController::class, 'sedevs'])->name('teacher-eschool-sedevs');
	Route::get('eschool/{slug}/sedev/{id}',[EschoolController::class, 'sedev'])->name('teacher-eschool-sedev');
	Route::get('eschool/{slug}/sedev/add',[EschoolController::class, 'sedevAdd'])->name('teacher-eschool-sedev-add');

	Route::get('eschool/{slug}/sedev/{id}/aguulga/add',[AguulgaController::class, 'aguulgaAdd'])->name('teacher-eschool-aguulga-add');

	Route::post('eschool/{slug}/sedev/save',[EschoolController::class, 'sedevSave'])->name('teacher-eschool-sedev-save');
	Route::post('eschool/{slug}/sedev/{id}/aguulga/save',[AguulgaController::class, 'aguulgaSave'])->name('teacher-eschool-aguulga-save');
	Route::post('eschool/{slug}/sedev/{id}/aguulga/uploads',[AguulgaController::class, 'aguulgaUploads'])->name('teacher-eschool-aguulga-uploads');

	// Event
	Route::get('events',[EventController::class, 'index'])->name('teacher-events');

	// Settings
	Route::get('settings',[SettingsController::class, 'index'])->name('teacher-settings');
	Route::get('settings/password',[SettingsController::class, 'password'])->name('teacher-settings-password');
	Route::get('settings/huvaari',[SettingsController::class, 'huvaari'])->name('teacher-settings-huvaari');

	Route::post('settings/changePassword',[SettingsController::class, 'changePassword'])->name('teacher-settings-changepassword');
	Route::post('settings/changePicture/{id}',[SettingsController::class, 'changePicture'])->name('teacher-settings-changepicture');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
