<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
Route::get('/', [SiteController::class, 'index'])->name('welcome');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/test', [SiteController::class, 'test'])->name('test');
Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

//test
// Route::get('/about', function () {
//     return 'Hellow about page';
// })->name('about');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function ()
{



    //Sidebar_Menu
    Route::get('/department/all', [DepartmentController::class, 'class_name'])->name('class_name');//Function URL หน้า Class
    Route::get('/register_student', [SiteController::class, 'register_student'])->name('register_student');




    //CRUD_Department
    Route::post('/department/add' , [DepartmentController::class,'store'])->name('addDepartment');//ปุ่มบันทึกหน้า Class
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('/department/update/{id}', [DepartmentController::class, 'update']);
    Route::get('/department/softdelete/{id}', [DepartmentController::class, 'softdelete']);
    Route::get('/department/recover/{id}', [DepartmentController::class, 'recover']);
    Route::get('/department/delete/{id}', [DepartmentController::class, 'delete']);


    //CRUD_Serive
    Route::get('/service/all', [ServiceController::class, 'index'])->name('menuservices'); //Sidebar
    Route::post('/service/add', [ServiceController::class, 'store'])->name('addServices'); //Controller
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);





    Route::get('/dashboard', function () {
        $users=DB::table('users')->get();
        return view('dashboard' ,compact('users'));
    })->name('dashboard');
});



Route::get('/pdf' , [PdfController::class , 'index'])->name('pdf');
Route::get('/pdf/ex1' , [PdfController::class , 'ex1'])->name('pdfex1');
Route::get('/pdf/ex2' , [PdfController::class , 'ex2'])->name('pdfex2');





//@forech PDF
Route::get('/pdf/ex3' , [PdfController::class , 'ex3'])->name('pdfex3');





Route::get('/service/form', [ServiceController::class, 'forms'])->name('formsave'); //Sidebar
Route::get('/service/pdf', [ServiceController::class, 'pdf'])->name('pdfmenu');

Route::get('/service/pdf/{id}', [ServiceController::class, 'pdf']);

Route::get('/service/generate-pdf/{id}', [ServiceController::class, 'generatePdf']);



